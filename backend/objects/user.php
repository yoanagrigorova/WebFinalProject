<?php
class User
{
    private $connection;
    private $table_name = "users";

    public $id;
    public $email;
    public $firstName;
    public $lastName;
    public $password;
    public $role;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    function read()
    {
        $query = "SELECT
                id, email, firstName, lastName, password, role
            FROM
            " . $this->table_name;

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
    function create()
    {
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                email=:email, firstName=:firstName, lastName=:lastName, password=:password";

        $statement = $this->connection->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->firstName = htmlspecialchars(strip_tags($this->firstName));
        $this->lastName = htmlspecialchars(strip_tags($this->lastName));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $statement->bindParam(":email", $this->email);
        $statement->bindParam(":firstName", $this->firstName);
        $statement->bindParam(":lastName", $this->lastName);
        $statement->bindParam(":password", $this->password);

        if ($statement->execute()) {
            return true;
        }

        return false;

    }
    function readOne()
    {
        $query = "SELECT
                id, email, firstName, lastName, password, role
            FROM
                " . $this->table_name . "
            WHERE
                email = ?";

        $statement = $this->connection->prepare($query);

        $statement->bindParam(1, $this->email);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $this->id = $row["id"];
        $this->email = $row["email"];
        $this->firstName = $row["firstName"];
        $this->lastName = $row["lastName"];
        $this->password = $row["password"];
        $this->role = $row["role"];
    }

    function delete()
    {

        $query = "DELETE FROM " . $this->table_name . " WHERE email = ?";

        $statement = $this->connection->prepare($query);

        $this->email = htmlspecialchars(strip_tags($this->email));

        $statement->bindParam(1, $this->email);

        if ($statement->execute()) {
            return true;
        }

        return false;

    }

   
}
?>