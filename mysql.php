<?php if (!defined('IN_SITE')) { echo "Zugriff verweigert!"; die(); }
class DB {
    private static $_db_username 		= "root";
    private static $_db_password 		= "";
    private static $_db_host 				= "localhost";
    private static $_db_name				= "tutcubede";
    private static $_db;

    function __construct() {
        try {
            self::$_db = new PDO("mysql:host=" . self::$_db_host . ";dbname=" . self::$_db_name,  self::$_db_username , self::$_db_password);
        } catch(PDOException $e) {
            echo "Datenbankverbindung gescheitert!";
            die();
        }
    }

    function isUserLoggedIn() {
        $stmt = self::$_db->prepare("SELECT User_ID FROM users WHERE Session=:sid");
        $sid = session_id();
        $stmt->bindParam(":sid", $sid);
        $stmt->execute();

        if($stmt->rowCount() === 1) {
            return true;
        } else {
            return false;
        }
    }

    function login($userMail, $pw) {
        $stmt = self::$_db->prepare("SELECT User_ID FROM users WHERE Email=:usermail AND Passwort=:pw");
        $stmt->bindParam(":usermail", $userMail);
        $stmt->bindParam(":pw", $pw);
        $stmt->execute();

        if($stmt->rowCount() === 1) {
            $stmt = self::$_db->prepare("Update users SET Session=:sid WHERE Email=:usermail AND Passwort=:pw");
            $sid = session_id();
            $stmt->bindParam(":sid", $sid);
            $stmt->bindParam(":usermail", $userMail);
            $stmt->bindParam(":pw", $pw);
            $stmt->execute();

            return true;
        } else {
            return false;
        }
    }

    function logout() {
        $stmt = self::$_db->prepare("Update users SET Session='' WHERE Session=:sid");
        $sid = session_id();
        $stmt->bindParam(":sid", $sid);
        $stmt->execute();
    }

    function getAllEntries($sort = "DESC") {
        if($sort != "ASC" && $sort != "DESC") {
            return -1;
        }

        $stmt = self::$_db->prepare("SELECT eintraege.Eintrag_ID, eintraege.Headline, eintraege.Datum, eintraege.Eintrag, users.Vorname, users.Nachname FROM eintraege INNER JOIN users ON eintraege.Autor = users.User_ID ORDER BY Datum " . $sort);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function createNewNews($titel, $news) {
        $stmt = self::$_db->prepare("INSERT INTO eintraege (Autor, Headline, Eintrag) VALUES(:autor, :titel, :news)");
        $autorID = self::getUserID();
        $stmt->bindParam(":autor", $autorID);
        $stmt->bindParam(":titel", $titel);
        $stmt->bindParam(":news", $news);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function getUserID() {
        $stmt = self::$_db->prepare("SELECT User_ID FROM users WHERE Session=:sid");
        $sid = session_id();
        $stmt->bindParam(":sid", $sid);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ)->User_ID;
    }

    function getUserName() {
        $stmt = self::$_db->prepare("SELECT Vorname, Nachname FROM users WHERE Session=:sid");
        $sid = session_id();
        $stmt->bindParam(":sid", $sid);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        return $user->Vorname . " " . $user->Nachname;
    }

    function getUserNameByID($userID) {
        $stmt = self::$_db->prepare("SELECT Vorname, Nachname FROM users WHERE User_ID=:userid");
        $stmt->bindParam(":userid", $userID);

        if($stmt->execute()) {
            if($stmt->rowCount() === 1) {
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                return $user->Vorname . " " . $user->Nachname;
            } else {
                return "";
            }
        } else {
            return "";
        }
    }

    function getEntryByID($id) {
        $stmt = self::$_db->prepare("SELECT eintraege.Eintrag_ID, eintraege.Headline, eintraege.Datum, eintraege.Eintrag, users.Vorname, users.Nachname FROM eintraege INNER JOIN users ON eintraege.Autor = users.User_ID WHERE Eintrag_ID=:id");
        $stmt->bindParam(":id", $id);

        if($stmt->execute()) {
            if($stmt->rowCount() === 1) {
                return $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function editEntry($titel, $news, $date, $id) {
        $stmt = self::$_db->prepare("UPDATE eintraege SET 
				Datum=:datum,
				Headline=:titel,
				Eintrag=:news 
				WHERE Eintrag_ID=:id");

        $date = date('Y-m-d H:i:s', strtotime($date));

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":datum", $date);
        $stmt->bindParam(":news", $news);
        $stmt->bindParam(":titel", $titel);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function deleteEntry($id) {
        $stmt = self::$_db->prepare("DELETE FROM eintraege WHERE Eintrag_ID=:id");
        $stmt->bindParam(":id", $id);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>