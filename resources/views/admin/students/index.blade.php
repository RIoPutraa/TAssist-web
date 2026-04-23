@extends('layout.admin')

@php
    $pageTitle = 'Students Management';
    $pageDescription = 'Manage all student records';

    $students = [
        [
            'no' => 1,
            'initial' => 'A',
            'name' => 'Andi Pratama',
            'email' => 'andi@student.ac.id',
            'nim' => '21610001',
            'department' => 'Informatika',
            'supervisor' => 'Dr. Budi Santoso',
            'status' => 'Approved',
        ],
        [
            'no' => 2,
            'initial' => 'S',
            'name' => 'Siti Rahma',
            'email' => 'siti@student.ac.id',
            'nim' => '21610002',
            'department' => 'Teknik Elektro',
            'supervisor' => 'Dr. Dewi Lestari',
            'status' => 'In Progress',
        ],
        [
            'no' => 3,
            'initial' => 'B',
            'name' => 'Budi Utomo',
            'email' => 'budi@student.ac.id',
            'nim' => '21610003',
            'department' => 'Informatika',
            'supervisor' => null,
            'status' => 'Pending',
        ],
        [
            'no' => 4,
            'initial' => 'D',
            'name' => 'Dewi Anggraini',
            'email' => 'dewi@student.ac.id',
            'nim' => '21610004',
            'department' => 'Teknik Elektro',
            'supervisor' => 'Prof. Eko Prasetyo',
            'status' => 'Approved',
        ],
        [
            'no' => 5,
            'initial' => 'F',
            'name' => 'Fajar Kurniawan',
            'email' => 'fajar@student.ac.id',
            'nim' => '21610005',
            'department' => 'Informatika',
            'supervisor' => null,
            'status' => 'Rejected',
        ],
        [
            'no' => 6,
            'initial' => 'G',
            'name' => 'Gita Nuraini',
            'email' => 'gita@student.ac.id',
            'nim' => '21610006',
            'department' => 'Teknik Elektro',
            'supervisor' => 'Dr. Budi Santoso',
            'status' => 'In Progress',
        ],
        [
            'no' => 7,
            'initial' => 'H',
            'name' => 'Hendra Wijaya',
            'email' => 'hendra@student.ac.id',
            'nim' => '21610007',
            'department' => 'Teknik Elektro',
            'supervisor' => 'Dr. Fitriani Hasanah',
            'status' => 'Approved',
        ],
        [
            'no' => 8,
            'initial' => 'I',
            'name' => 'Indah Permata',
            'email' => 'indah@student.ac.id',
            'nim' => '21610008',
            'department' => 'Informatika',
            'supervisor' => null,
            'status' => 'Pending',
        ],
    ];

    function badgeClass($status) {
        return match($status) {
            'Approved' => 'bg-[rgba(61,220,151,0.15)] text-[#3DDC97]',
            'Pending' => 'bg-[rgba(255,185,0,0.15)] text-[#FFB900]',
            'Rejected' => 'bg-[rgba(255,77,77,0.15)] text-[#FF4D4D]',
            'In Progress' => 'bg-[rgba(77,163,255,0.15)] text-[#4DA3FF]',
            default => 'bg-[rgba(160,168,192,0.15)] text-[#A0A8C0]',
        };
    }
@endphp

@section('content')
<div class="space-y-5">
    <!-- Top Filter -->
    <div class="flex flex-wrap items-center gap-3">
        <div class="relative flex-1 min-w-[280px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-[#A0A8C0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input
                type="text"
                placeholder="Search by name or NIM..."
                class="w-full pl-11 pr-4 py-3 rounded-2xl bg-[#242D45] border border-[#3A4566] text-sm text-white outline-none placeholder:text-[#7F89A8] focus:border-[#4DA3FF]"
            >
        </div>

        <button class="w-12 h-12 rounded-2xl bg-[#242D45] border border-[#3A4566] flex items-center justify-center text-[#A0A8C0]">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2l-7 7v5l-4 2v-7L3 6V4z" />
            </svg>
        </button>

        <select class="min-w-[180px] px-4 py-3 rounded-2xl bg-[#242D45] border border-[#3A4566] text-sm text-[#A0A8C0] outline-none">
            <option>All Departments</option>
            <option>Informatika</option>
            <option>Sistem Informasi</option>
            <option>Teknik Elektro</option>
        </select>

        <select class="min-w-[160px] px-4 py-3 rounded-2xl bg-[#242D45] border border-[#3A4566] text-sm text-[#A0A8C0] outline-none">
            <option>All Status</option>
            <option>Approved</option>
            <option>Pending</option>
            <option>Rejected</option>
            <option>In Progress</option>
        </select>

        <button
            onclick="document.getElementById('addStudentModal').classList.remove('hidden')"
            class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-[#0057B8] text-white font-semibold hover:bg-[#0046A0] transition"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Student
        </button>
    </div>

    <!-- Table -->
    <div class="rounded-[24px] overflow-hidden border border-[#3A4566]">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-[#242D45]">
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">No</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Name</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">NIM</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Department</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Assigned Supervisor</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">TA Status</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $student)
                        <tr class="{{ $index % 2 === 0 ? 'bg-[#1A2035]' : 'bg-[#242D45]' }} border-b border-[#3A4566]">
                            <td class="px-5 py-5 text-[15px] text-[#A0A8C0]">{{ $student['no'] }}</td>
                            <td class="px-5 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 rounded-full bg-[#0057B8] text-white text-sm font-bold flex items-center justify-center flex-shrink-0">
                                        {{ $student['initial'] }}
                                    </div>
                                    <div>
                                        <p class="text-white text-[15px] font-medium">{{ $student['name'] }}</p>
                                        <p class="text-sm text-[#A0A8C0]">{{ $student['email'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 text-[15px] text-[#A0A8C0]">{{ $student['nim'] }}</td>
                            <td class="px-5 py-5 text-[15px] text-[#A0A8C0]">{{ $student['department'] }}</td>
                            <td class="px-5 py-5 text-[15px] {{ $student['supervisor'] ? 'text-white' : 'text-[#A0A8C0]' }}">
                                {!! $student['supervisor'] ? nl2br(e($student['supervisor'])) : '&mdash; Unassigned' !!}
                            </td>
                            <td class="px-5 py-5">
                                <span class="px-3 py-1 rounded-full text-sm font-medium {{ badgeClass($student['status']) }}">
                                    {{ $student['status'] }}
                                </span>
                            </td>
                            <td class="px-5 py-5">
                                <div class="flex items-center gap-3">
                                    <button onclick="document.getElementById('viewStudentModal').classList.remove('hidden')" class="text-[#4DA3FF] hover:opacity-80">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>

                                    <button onclick="document.getElementById('editStudentModal').classList.remove('hidden')" class="text-[#FFB900] hover:opacity-80">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5h2m-1 0v14m-7 0h14" class="hidden"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 4h4a2 2 0 012 2v4m-9.586 9.586L3 21l1.414-4.414L14 7l3 3-9.586 9.586z"/>
                                        </svg>
                                    </button>

                                    <button onclick="document.getElementById('deleteStudentModal').classList.remove('hidden')" class="text-[#FF4D4D] hover:opacity-80">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m-7 0l1 12h6l1-12" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between px-5 py-4 bg-[#242D45] border-t border-[#3A4566]">
            <p class="text-sm text-[#A0A8C0]">Showing 1–8 of 12 students</p>

            <div class="flex items-center gap-3">
                <button class="text-[#66708F]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button class="w-10 h-10 rounded-xl bg-[#0057B8] text-white text-sm font-semibold">1</button>
                <button class="w-10 h-10 rounded-xl text-[#A0A8C0] text-sm">2</button>

                <button class="text-[#A0A8C0]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Student Modal -->
<div id="addStudentModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-3xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">Add Student</h2>
            <button onclick="document.getElementById('addStudentModal').classList.add('hidden')" class="text-[#A0A8C0]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-2 gap-5">
            <div class="col-span-2">
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Full Name</label>
                <input type="text" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Student ID (NIM)</label>
                <input type="text" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Email</label>
                <input type="email" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Year</label>
                <input type="text" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Department</label>
                <select class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
                    <option>Select Department</option>
                    <option>Informatika</option>
                    <option>Sistem Informasi</option>
                    <option>Teknik Elektro</option>
                </select>
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Status</label>
                <select class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
                    <option>Select Status</option>
                    <option>Approved</option>
                    <option>Pending</option>
                    <option>Rejected</option>
                    <option>In Progress</option>
                </select>
            </div>

            <div class="col-span-2">
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Assigned Supervisor</label>
                <select class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
                    <option>No Supervisor</option>
                    <option>Dr. Budi Santoso</option>
                    <option>Dr. Dewi Lestari</option>
                    <option>Prof. Eko Prasetyo</option>
                    <option>Dr. Fitriani Hasanah</option>
                </select>
            </div>
        </div>

        <div class="flex gap-4 mt-8">
            <button onclick="document.getElementById('addStudentModal').classList.add('hidden')" class="flex-1 py-3 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                Cancel
            </button>
            <button class="flex-1 py-3 rounded-2xl bg-[#0057B8] text-white text-lg font-semibold">
                Add Student
            </button>
        </div>
    </div>
</div>

<!-- View Student Modal -->
<div id="viewStudentModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-3xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">Student Details</h2>
            <button onclick="document.getElementById('viewStudentModal').classList.add('hidden')" class="text-[#A0A8C0]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-2 gap-5">
            <div class="col-span-2">
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Full Name</label>
                <input type="text" value="Andi Pratama" disabled class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white/80 outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Student ID (NIM)</label>
                <input type="text" value="21610001" disabled class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white/80 outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Email</label>
                <input type="email" value="andi@student.ac.id" disabled class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white/80 outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Year</label>
                <input type="text" value="2021" disabled class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white/80 outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Department</label>
                <input type="text" value="Informatika" disabled class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white/80 outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Status</label>
                <input type="text" value="Approved" disabled class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white/80 outline-none">
            </div>

            <div class="col-span-2">
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Assigned Supervisor</label>
                <input type="text" value="Dr. Budi Santoso" disabled class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white/80 outline-none">
            </div>
        </div>
    </div>
</div>

<!-- Edit Student Modal -->
<div id="editStudentModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-3xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">Edit Student</h2>
            <button onclick="document.getElementById('editStudentModal').classList.add('hidden')" class="text-[#A0A8C0]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-2 gap-5">
            <div class="col-span-2">
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Full Name</label>
                <input type="text" value="Andi Pratama" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Student ID (NIM)</label>
                <input type="text" value="21610001" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Email</label>
                <input type="email" value="andi@student.ac.id" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Year</label>
                <input type="text" value="2021" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Department</label>
                <select class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
                    <option>Informatika</option>
                    <option>Sistem Informasi</option>
                    <option>Teknik Elektro</option>
                </select>
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Status</label>
                <select class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
                    <option>Approved</option>
                    <option>Pending</option>
                    <option>Rejected</option>
                    <option>In Progress</option>
                </select>
            </div>

            <div class="col-span-2">
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Assigned Supervisor</label>
                <select class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
                    <option>Dr. Budi Santoso</option>
                    <option>Dr. Dewi Lestari</option>
                    <option>Prof. Eko Prasetyo</option>
                    <option>Dr. Fitriani Hasanah</option>
                </select>
            </div>
        </div>

        <div class="flex gap-4 mt-8">
            <button onclick="document.getElementById('editStudentModal').classList.add('hidden')" class="flex-1 py-3 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                Cancel
            </button>
            <button class="flex-1 py-3 rounded-2xl bg-[#0057B8] text-white text-lg font-semibold">
                Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Delete Student Modal -->
<div id="deleteStudentModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <h2 class="text-white text-2xl font-bold mb-4">Confirm Delete</h2>
        <p class="text-[#A0A8C0] text-[17px] leading-8 mb-8">
            Are you sure you want to delete this student? This action cannot be undone.
        </p>

        <div class="flex gap-4">
            <button onclick="document.getElementById('deleteStudentModal').classList.add('hidden')" class="flex-1 py-3 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                Cancel
            </button>
            <button class="flex-1 py-3 rounded-2xl bg-[#FF4D4D] text-white text-lg font-semibold">
                Delete
            </button>
        </div>
    </div>
</div>
@endsection