<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table(name="log")
 * @ORM\Entity
 */
class Log
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLog;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="log_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $logAt = 'CURRENT_TIMESTAMP';

    /**
     * @var int|null
     *
     * @ORM\Column(name="action_name", type="smallint", nullable=true)
     */
    private $actionName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="table_name", type="string", length=255, nullable=true)
     */
    private $tableName;

    /**
     * @var json|null
     *
     * @ORM\Column(name="data", type="json", nullable=true)
     */
    private $data;

    public function getIdLog(): ?int
    {
        return $this->idLog;
    }

    public function getLogAt(): ?\DateTimeInterface
    {
        return $this->logAt;
    }

    public function setLogAt(\DateTimeInterface $logAt): self
    {
        $this->logAt = $logAt;

        return $this;
    }

    public function getActionName(): ?int
    {
        return $this->actionName;
    }

    public function setActionName(?int $actionName): self
    {
        $this->actionName = $actionName;

        return $this;
    }

    public function getTableName(): ?string
    {
        return $this->tableName;
    }

    public function setTableName(?string $tableName): self
    {
        $this->tableName = $tableName;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }


}
