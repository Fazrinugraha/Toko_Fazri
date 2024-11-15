<?php

namespace App\Imports;

use App\Models\Distributor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class DistributorImport implements ToModel, WithHeadingRow
{
    /**
     * Map Excel row to model fields
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Log row for debugging purposes
        \Log::info($row);

        return new Distributor([
            'nama_distibutor' => $row['nama_distibutor'], // Ensure column names match Excel headers
            'lokasi' => $row['lokasi'],
            'kontak' => $row['kontak'],
            'email' => $row['email'],
        ]);
    }
}

