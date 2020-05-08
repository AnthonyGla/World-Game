<?php
class Game
{
    public function getUsernamesGames($username)
    {
        $sth = Database::getInstance()->prepare('SELECT u.username, ug.* FROM users u INNER JOIN username_game ug ON u.id = ug.id_users WHERE u.username = :username');
        $sth->bindValue(':username', $username, PDO::PARAM_STR);
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function updateNameGame($name, $id, $game)
    {
        $sth = Database::getInstance()->prepare('UPDATE username_game SET username_game = :name WHERE id_users = :id_users AND id_list_games = :id_list_games');
        $sth->bindValue(':name', $name, PDO::PARAM_STR);
        $sth->bindValue(':id_users', $id, PDO::PARAM_INT);
        $sth->bindValue(':id_list_games', $game, PDO::PARAM_INT);
        $sth->execute();
    }
}
