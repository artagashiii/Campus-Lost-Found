<?php

abstract class IdObject {
    protected int $id;

    public function __construct(int $id) {
        if ($id <= 0) {
            throw new InvalidArgumentException("ID duhet të jetë pozitiv.");
        }

        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function equals(IdObject $other): bool {
        return $this->id === $other->getId();
    }

    public function __toString(): string {
        return (string)$this->id;
    }
}
?>