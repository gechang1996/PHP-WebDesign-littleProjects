<?php
/**
 * @file
 * Base class for all table classes
 */
namespace Felis;

/**
 * Base class for all table classes
 */
class Cases extends Table{
    public function update($number,$summary,$agent,$status,$id)
    {


        $sql = <<<SQL
update $this->tableName
set number=? , summary=?, agent=?, status=?
where id=?
SQL;
        $pdo = $this->pdo();
        $statement1 = $pdo->prepare($sql);
        $statement1->execute(array($number,$summary,$agent,$status,$id));


    }
    public function delete($id) {
        $sql=<<<SQL
DELETE FROM $this->tableName
WHERE id=?
SQL;
        $pdo = $this->pdo();
        $statement1 = $pdo->prepare($sql);
        $statement1->execute(array($id));

    }






    public function getCases(){
    $users=new Users($this->site);
    $table_name=$users->getTableName();
        $sql=<<<SQL
SELECT $this->tableName.id,$this->tableName.client,a.name as clientName,$this->tableName.agent,b.name as agentName,$this->tableName.number,$this->tableName.summary,$this->tableName.status FROM $this->tableName
INNER JOIN $table_name as  a
on a.id=client
INNER JOIN $table_name as  b
on b.id=agent
ORDER BY status DESC,number
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute();
        $a=$statement->fetchAll(\PDO::FETCH_ASSOC);
        $return_ary=array();
        foreach ($a as $item){
            $return_ary[]=new ClientCase($item);
        }

        return $return_ary;

    }

    public function __construct(Site $site) {
        parent::__construct($site, "case");
    }


    public function insert($client, $agent, $number) {
        $sql = <<<SQL
insert into $this->tableName(client, agent, number, summary, status)
values(?, ?, ?, "", ?)
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            if($statement->execute(array($client,
                        $agent,
                        $number,
                        ClientCase::STATUS_OPEN)
                ) === false) {
                return null;
            }
        } catch(\PDOException $e) {
            return null;
        }

        return $pdo->lastInsertId();
    }


    /**
     * Get a case by id
     * @param $id The case by ID
     * @returns Object that represents the case if successful,
     *  null otherwise.
     */
    public function get($id) {
        $users = new Users($this->site);
        $usersTable = $users->getTableName();

        $sql = <<<SQL
SELECT c.id, c.client, client.name as clientName,
       c.agent, agent.name as agentName,
       number, summary, status
from $this->tableName c,
     $usersTable client,
     $usersTable agent
where c.client = client.id and
      c.agent=agent.id and
      c.id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($id));
        if($statement->rowCount() === 0) {
            return null;
        }

        return new ClientCase($statement->fetch(\PDO::FETCH_ASSOC));

    }



}