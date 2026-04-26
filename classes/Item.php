<?php
require_once __DIR__ . '/IdObject.php';

class Item extends IdObject {
    private string $title;
    private string $description;
    private string $location;
    private string $status; 

    public function __construct(int $id, string $title, string $description, string $location, string $status) {
        parent::__construct($id); 
        $this->title = $title;
        $this->description = $description;
        $this->location = $location;
        $this->status = $status;
    }

    public function getTitle(): string { return $this->title; }
    public function getDescription(): string { return $this->description; }
    public function getLocation(): string { return $this->location; }
    public function getStatus(): string { return $this->status; }

    public function setTitle(string $title): void { $this->title = $title; }
}

class ReportedItem extends Item {
    private int $reportedBy; 

    public function __construct(int $id, string $title, string $description, string $location, string $status, int $userId) {
        parent::__construct($id, $title, $description, $location, $status);
        $this->reportedBy = $userId;
    }

    public function getReporterId(): int {
        return $this->reportedBy;
    }
}
