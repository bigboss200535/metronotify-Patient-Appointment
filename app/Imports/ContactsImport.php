<?php

namespace App\Imports;

use App\Models\Contacts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class ContactsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    protected $groupName;
    protected $rowCount = 0;
    protected $failedCount = 0;
    protected $failedRows = [];

    public function __construct($groupName)
    {
        $this->groupName = $groupName;
    }

    public function model(array $row)
    {
        $this->rowCount++;

        // Validate the row data
        $validator = Validator::make($row, [
            'telephone' => ['required', 'string', 'regex:/^[+]?[0-9\s\-\(\)]+$/'],
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        if ($validator->fails()) {
            $this->failedCount++;
            $this->failedRows[] = [
                'row' => $this->rowCount,
                'data' => $row,
                'errors' => $validator->errors()->all()
            ];
            return null;
        }

        // Check if contact already exists
        $existingContact = Contacts::where('telephone', $row['telephone'])
            ->where('telephone_group', $this->groupName)
            ->first();

        if ($existingContact) {
            // Update existing contact
            $existingContact->update([
                'archived' => 'No',
            ]);
            return null; // Skip creating new record
        }

        return new Contacts([
            'telephone' => $row['telephone'],
            'telephone_group' => $this->groupName,
            'archived' => 'No',
            'added_date' => now(),
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function getRowCount()
    {
        return $this->rowCount;
    }

    public function getFailedCount()
    {
        return $this->failedCount;
    }

    public function getFailedRows()
    {
        return $this->failedRows;
    }
}
