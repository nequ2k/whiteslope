<?php

class current_user_classes extends Dbh
{
    private int $userid;
    private string $username;
    private string $user_email;
    private string $preferences;

    public function __construct()
    {
        $this->userid = $_SESSION['userid'];
        $this->user_email = $_SESSION['user_email'];
        $this->username = $_SESSION['user_name'];
        $dbh = new Dbh();
        $connection = $dbh->connect();
        $query = 'SELECT preference FROM user_preferences WHERE user_id = :id';
        $stmt = $connection->prepare($query);
        $stmt->bindValue(':id', $_SESSION['userid'], PDO::PARAM_STR);
        $stmt->execute();
        $recipesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->preferences = $recipesData[0]["preference"];
    }

    /**
     * @return string
     */
    public function getPreferences(): string
    {
        return $this->preferences;
    }


}