<?php

namespace Alura\Pdo\Infraestructure\Repository;

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Repository\StudentsRepository;
use Alura\Pdo\Infraestructure\Persistence\ConnectionCreator;
use DateTimeImmutable;
use PDO;

class PdoStudentsRepository implements StudentsRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Student $student):bool 
    {
        if($student->id() === null){
            return $this->Insert($student);
        }

        return $this->update($student);
    }

    public function Insert(Student $student): bool{
        $sqlInsert = "INSERT INTO Students (name, birth_date) VALUES (:name, :birth_date);"; 
        $stmt = $this->connection->prepare($sqlInsert);

        if($stmt === false){
            throw new \RuntimeException($this->connection->errorInfo()[2]);
        }

        $sucess = $stmt->execute([
            ':name' => $student->name(),
            ':birth_date' => $student->birthDate()->format('Y-m-d')
        ]);
        
        if($sucess){
            $student->defineId($this->connection->lastInsertId());
        }

        return $sucess;
    }

    public function remove(Student $student):bool
    {
        $sqlDelete = "DELETE FROM Students WHERE id = :id;";
        $stmt = $this->connection->prepare($sqlDelete);
        $stmt->bindValue(':id', $student->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function update(Student $student): bool{
        $sqlUpdate = 'UPDATE students SET name = :name, birth_date = :birth_date WHERE id = :id;';
        $stmt = $this->connection->prepare($sqlUpdate);
        $stmt->bindValue(':name', $student->name());
        $stmt->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
        $stmt->bindValue(':id', $student->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getBirthAt(\DateTimeInterface $birthDate): array
    {
        $sqlBirth = "SELECT * FROM Students WHERE birth_date = ?;";
        $stmt = $this->connection->prepare($sqlBirth);
        $stmt->bindValue(':birth_date', $birthDate->format('Y-m-d'));
        $stmt->execute();

        return $this->hydrateStudentList($stmt);
    }

    public function allStudents():array
    {
        $stmt = $this->connection->query('SELECT * FROM Students;');
        return $this->hydrateStudentList($stmt);

    }

    private function hydrateStudentList(\PDOStatement $stmt): array 
    {
        $studentDataList = $stmt->fetchAll();
        $studentList = [];

        foreach($studentDataList as $studentData){
            $student = new Student(
                $studentData['id'],
                $studentData['name'],
                new DateTimeImmutable($studentData['birth_date'])
            );
            $studentList[] = $student;
        }

        return $studentList;
    }

    public function studentsWithPhones(): array
    {
        $query = 'SELECT 
                        students.id,
                        students.name,
                        students.birth_date,
                        phones.id as phone_id,
                        phones.area_code,
                        phones.number
                    FROM 
                        students JOIN phones ON students.id = phones.student_id;';
        $stmt = $this->connection->query($query);
        $result = $stmt->fetchAll();
        $studentList = [];

        foreach($result as $row){
            if(!array_key_exists($row['id'], $studentList)){
                $studentList[$row['id']] = new Student(
                    $row['id'],
                    $row['name'],
                    new DateTimeImmutable($row['birth_date'])
                );
            }
            $phone = new Phone($row['phone_id'], $row['area_code'], $row['number']);
            $studentList[$row['id']]->addPhone($phone);
        }
        return $studentList;
                    
    }

    //ESTUDAR ISSO DAQUI DIREITO DPS
    // public function fillPhonesOf(Student $student): void 
    // {
    //     $sqlPhones = "SELECT id, area_code, number FROM phones WHERE student_id = :id";
    //     $stmt = $this->connection->prepare($sqlPhones);
    //     $stmt->bindValue(':id', $student->id(), PDO::PARAM_INT);
    //     $stmt->execute();

    //     $phonesDataList = $stmt->fetchAll();

    //     if (!empty($phonesDataList)) {
    //         foreach($phonesDataList as $phoneData){
    //             $phone = new Phone(
    //                 $phoneData['id'],
    //                 $phoneData['area_code'],
    //                 $phoneData['number']
    //             );
    
    //             $student->addPhone($phone);
    //         }
    //     }
    // }
}

?>