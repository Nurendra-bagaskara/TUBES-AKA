<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PatientsImport;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all(); // Mengambil semua data pasien
        return view('search', compact('patients'));
    }

    // Fungsi Sequential Search
    public function sequentialSearch(Request $request)
    {
        $start_time = microtime(true); // Waktu mulai pencarian
        $patients = Patient::all(); // Ambil semua data pasien
        $search = $request->input('search'); // Input pencarian

        $i = 0;
        $found = false;
        $result = null;

        // Iteratif Sequential Search
        while ($i < count($patients) && !$found) {
            if ($patients[$i]->kode === $search) {
                $found = true;
                $result = $patients[$i];
            }
            $i++;
        }

        $end_time = microtime(true); // Waktu selesai pencarian
        $execution_time = $end_time - $start_time; // Hitung durasi pencarian

        if ($found) {
            return view('search', [
                'patients' => collect([$result]),
                'time' => $execution_time,
                'search' => $search,
                'messages' => 'Data ini Menggunakan Pencarian Iteratif.'
            ]);
        } else {
            return view('search', [
                'message' => 'Data tidak ditemukan ',
                'time' => $execution_time,
                'search' => $search,
            ]);
        }
    }

    public function showRecursiveSearch()
    {
        $patients = Patient::all(); // Ambil semua data pasien
        return view('rekursive', compact('patients'));
    }
    
    public function sequentialSearchRecursive(Request $request)
    {
        $start_time = microtime(true); // Waktu mulai pencarian
        $patients = Patient::all(); // Ambil semua data pasien
        $search = $request->input('search'); // Input pencarian

        $index = 0;

        // Memulai pencarian
        $result = $this->searchRecursive($patients, $search, $index);

        $end_time = microtime(true); // Waktu selesai pencarian
        $execution_time = $end_time - $start_time; // Hitung durasi pencarian

        if ($result) {
            return view('rekursive', [
                'patients' => collect([$result]),
                'time' => $execution_time,
                'search' => $search,
                'Success_message' => 'Data ini Menggunakan Pencarian Recursive.'
            ]);
        } else {
            return view('rekursive', [
                'error_message' => 'Data tidak ditemukan',
                'time' => $execution_time,
                'search' => $search,
            ]);
        }
    }

    // Fungsi rekursif langsung
    function searchRecursive($patients, $search, $index)
    {
        if ($index >= count($patients)) {
            return null;
        }

        if ($patients[$index]->kode === $search) {
            return $patients[$index];
        }

        return $this->searchRecursive($patients, $search, $index + 1);
    }

    // Menampilkan form upload
    public function showForm()
    {
        return view('upload');  // Pastikan nama file sesuai dengan yang kamu buat
    }

    // Mengimpor data dari file Excel
    public function import(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',  // Pastikan hanya file Excel yang diterima
        ]);

        // Mengimpor file menggunakan Maatwebsite Excel package
        try {
            Excel::import(new PatientsImport, $request->file('file'));

            return redirect()->back()->with('success', 'Data pasien berhasil diimpor.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengimpor data: ' . $e->getMessage());
        }
    }
}

