@extends('layout.admin')

@php
    $pageTitle = 'Lecturers Management';
    $pageDescription = 'Manage all lecturer records';

    $lecturers = [
        [
            'initial' => 'S',
            'name' => 'Dr. Budi Santoso',
            'nidn' => '0012345601',
            'department' => 'Informatika',
            'specialization' => 'Artificial Intelligence',
            'email' => 'budi.santoso@lecturer.ac.id',
            'current' => 3,
            'max' => 5,
        ],
        [
            'initial' => 'L',
            'name' => 'Dr. Dewi Lestari',
            'nidn' => '0012345602',
            'department' => 'Sistem Informasi',
            'specialization' => 'Database Systems',
            'email' => 'dewi.lestari@lecturer.ac.id',
            'current' => 2,
            'max' => 4,
        ],
        [
            'initial' => 'P',
            'name' => 'Prof. Eko Prasetyo',
            'nidn' => '0012345603',
            'department' => 'Teknik Elektro',
            'specialization' => 'Embedded Systems',
            'email' => 'eko.prasetyo@lecturer.ac.id',
            'current' => 4,
            'max' => 4,
        ],
        [
            'initial' => 'H',
            'name' => 'Dr. Fitriani Hasanah',
            'nidn' => '0012345604',
            'department' => 'Teknik Elektro',
            'specialization' => 'Power Systems',
            'email' => 'fitriani.hasanah@lecturer.ac.id',
            'current' => 1,
            'max' => 5,
        ],
        [
            'initial' => 'P',
            'name' => 'Dr. Gunawan Putra',
            'nidn' => '0012345605',
            'department' => 'Informatika',
            'specialization' => 'Computer Networks',
            'email' => 'gunawan.putra@lecturer.ac.id',
            'current' => 0,
            'max' => 3,
        ],
        [
            'initial' => 'H',
            'name' => 'Prof. Handayani',
            'nidn' => '0012345606',
            'department' => 'Sistem Informasi',
            'specialization' => 'Information Security',
            'email' => 'handayani@lecturer.ac.id',
            'current' => 3,
            'max' => 5,
        ],
        [
            'initial' => 'M',
            'name' => 'Dr. Irfan Maulana',
            'nidn' => '0012345607',
            'department' => 'Informatika',
            'specialization' => 'Machine Learning',
            'email' => 'irfan.maulana@lecturer.ac.id',
            'current' => 2,
            'max' => 4,
        ],
        [
            'initial' => 'S',
            'name' => 'Dr. Juliana Sari',
            'nidn' => '0012345608',
            'department' => 'Sistem Informasi',
            'specialization' => 'Business Intelligence',
            'email' => 'juliana.sari@lecturer.ac.id',
            'current' => 5,
            'max' => 5,
        ],
    ];
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
                placeholder="Search by name or NIDN..."
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

        <button
            onclick="document.getElementById('addLecturerModal').classList.remove('hidden')"
            class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-[#0057B8] text-white font-semibold hover:bg-[#0046A0] transition"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Lecturer
        </button>
    </div>

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @foreach ($lecturers as $lecturer)
            @php
                $pct = $lecturer['max'] > 0 ? round(($lecturer['current'] / $lecturer['max']) * 100) : 0;
                $isFull = $lecturer['current'] >= $lecturer['max'];

                if ($isFull) {
                    $badgeBg = 'rgba(255,77,77,0.15)';
                    $badgeColor = '#FF4D4D';
                    $badgeText = 'Full';
                    $barColor = '#FF4D4D';
                } else {
                    $badgeBg = 'rgba(61,220,151,0.15)';
                    $badgeColor = '#3DDC97';
                    $badgeText = 'Available';
                    $barColor = $pct > 70 ? '#FFB900' : '#3DDC97';
                }
            @endphp

            <div class="rounded-[24px] p-5 bg-[#242D45] border border-[#3A4566]">
                <div class="flex items-start justify-between mb-5">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-[#0057B8] flex items-center justify-center text-white text-xl font-bold flex-shrink-0">
                            {{ $lecturer['initial'] }}
                        </div>
                        <div>
                            <h3 class="text-white text-[17px] font-bold leading-tight">{{ $lecturer['name'] }}</h3>
                            <p class="text-[#A0A8C0] text-sm mt-1">{{ $lecturer['nidn'] }}</p>
                        </div>
                    </div>

                    <span class="px-3 py-1 rounded-full text-sm font-medium" style="background-color: {{ $badgeBg }}; color: {{ $badgeColor }};">
                        {{ $badgeText }}
                    </span>
                </div>

                <div class="space-y-3 mb-5">
                    <div class="flex justify-between gap-4 text-[15px]">
                        <span class="text-[#A0A8C0]">Department</span>
                        <span class="text-white font-medium text-right">{{ $lecturer['department'] }}</span>
                    </div>

                    <div class="flex justify-between gap-4 text-[15px]">
                        <span class="text-[#A0A8C0]">Specialization</span>
                        <span class="text-white font-medium text-right max-w-[55%]">{{ $lecturer['specialization'] }}</span>
                    </div>

                    <div class="flex justify-between gap-4 text-[15px]">
                        <span class="text-[#A0A8C0]">Email</span>
                        <span class="text-[#4DA3FF] text-right max-w-[55%] break-all">{{ $lecturer['email'] }}</span>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="flex justify-between items-center text-sm mb-2">
                        <span class="text-[#A0A8C0]">Supervision Quota</span>
                        <span class="font-semibold" style="color: {{ $isFull ? '#FF4D4D' : '#3DDC97' }}">
                            {{ $lecturer['current'] }}/{{ $lecturer['max'] }}
                        </span>
                    </div>

                    <div class="h-2.5 rounded-full overflow-hidden bg-[#3A4566]">
                        <div class="h-full rounded-full" style="width: {{ $pct }}%; background-color: {{ $barColor }}"></div>
                    </div>
                </div>

                <div class="flex gap-2">
                    <button
                        onclick="document.getElementById('editLecturerModal').classList.remove('hidden')"
                        class="flex-1 flex items-center justify-center gap-2 py-3 rounded-xl border border-[#3A4566] text-[#A0A8C0] hover:bg-[#2A3352] hover:text-white transition"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] h-[14px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 4h4a2 2 0 012 2v4m-9.586 9.586L3 21l1.414-4.414L14 7l3 3-9.586 9.586z"/>
                        </svg>
                        <span class="text-sm">Edit</span>
                    </button>

                    <button
                        onclick="document.getElementById('quotaLecturerModal').classList.remove('hidden')"
                        class="flex-1 flex items-center justify-center gap-2 py-3 rounded-xl border border-[rgba(77,163,255,0.3)] text-[#4DA3FF] bg-[rgba(77,163,255,0.05)] hover:bg-[rgba(77,163,255,0.12)] transition"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] h-[14px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3a1.5 1.5 0 013 0v1.084a6.002 6.002 0 013.918 3.918H18a1.5 1.5 0 010 3h-1.084a6.002 6.002 0 01-3.918 3.918V18a1.5 1.5 0 01-3 0v-1.084a6.002 6.002 0 01-3.918-3.918H6a1.5 1.5 0 010-3h1.084a6.002 6.002 0 013.918-3.918V3z"/>
                        </svg>
                        <span class="text-sm">Set Quota</span>
                    </button>

                    <button
                        onclick="document.getElementById('deleteLecturerModal').classList.remove('hidden')"
                        class="w-11 h-11 rounded-xl border border-[rgba(255,77,77,0.3)] text-[#FF4D4D] bg-[rgba(255,77,77,0.05)] hover:bg-[rgba(255,77,77,0.12)] transition flex items-center justify-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[16px] h-[16px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 7h12M9 7V5a1 1 0 011-1h4a1 1 0 011 1v2m-7 0l1 12h6l1-12" />
                        </svg>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Add Lecturer Modal -->
<div id="addLecturerModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-3xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">Add Lecturer</h2>
            <button onclick="document.getElementById('addLecturerModal').classList.add('hidden')" class="text-[#A0A8C0]">
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
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">NIDN</label>
                <input type="text" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Email</label>
                <input type="email" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div class="col-span-2">
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Specialization</label>
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
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Max Quota</label>
                <input type="number" value="0" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>
        </div>

        <div class="flex gap-4 mt-8">
            <button onclick="document.getElementById('addLecturerModal').classList.add('hidden')" class="flex-1 py-3 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                Cancel
            </button>
            <button class="flex-1 py-3 rounded-2xl bg-[#0057B8] text-white text-lg font-semibold">
                Add Lecturer
            </button>
        </div>
    </div>
</div>

<!-- Edit Lecturer Modal -->
<div id="editLecturerModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-3xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">Edit Lecturer</h2>
            <button onclick="document.getElementById('editLecturerModal').classList.add('hidden')" class="text-[#A0A8C0]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-2 gap-5">
            <div class="col-span-2">
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Full Name</label>
                <input type="text" value="Dr. Budi Santoso" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">NIDN</label>
                <input type="text" value="0012345601" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Email</label>
                <input type="email" value="budi.santoso@lecturer.ac.id" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div class="col-span-2">
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Specialization</label>
                <input type="text" value="Artificial Intelligence" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
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
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Max Quota</label>
                <input type="number" value="5" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>
        </div>

        <div class="flex gap-4 mt-8">
            <button onclick="document.getElementById('editLecturerModal').classList.add('hidden')" class="flex-1 py-3 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                Cancel
            </button>
            <button class="flex-1 py-3 rounded-2xl bg-[#0057B8] text-white text-lg font-semibold">
                Save Changes
            </button>
        </div>
    </div>
</div>

<!-- Set Quota Modal -->
<div id="quotaLecturerModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-2xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">Set Quota</h2>
            <button onclick="document.getElementById('quotaLecturerModal').classList.add('hidden')" class="text-[#A0A8C0]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <p class="text-[#A0A8C0] text-base mb-5">
            Setting quota for: <span class="text-white font-semibold">Dr. Budi Santoso</span>
        </p>

        <div class="rounded-2xl bg-[#2A3352] p-5 mb-5">
            <div class="flex justify-between text-sm mb-3">
                <span class="text-[#A0A8C0]">Current Students</span>
                <span class="text-white font-semibold">3</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-[#A0A8C0]">Remaining Slots</span>
                <span class="text-[#3DDC97] font-semibold">2</span>
            </div>
        </div>

        <div>
            <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Max Quota</label>
            <input type="number" value="5" class="w-full px-4 py-3 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
        </div>

        <div class="flex gap-4 mt-8">
            <button onclick="document.getElementById('quotaLecturerModal').classList.add('hidden')" class="flex-1 py-3 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                Cancel
            </button>
            <button class="flex-1 py-3 rounded-2xl bg-[#0057B8] text-white text-lg font-semibold">
                Update Quota
            </button>
        </div>
    </div>
</div>

<!-- Delete Lecturer Modal -->
<div id="deleteLecturerModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <h2 class="text-white text-2xl font-bold mb-4">Confirm Delete</h2>
        <p class="text-[#A0A8C0] text-[17px] leading-8 mb-8">
            Are you sure you want to delete this lecturer? This action cannot be undone.
        </p>

        <div class="flex gap-4">
            <button onclick="document.getElementById('deleteLecturerModal').classList.add('hidden')" class="flex-1 py-3 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                Cancel
            </button>
            <button class="flex-1 py-3 rounded-2xl bg-[#FF4D4D] text-white text-lg font-semibold">
                Delete
            </button>
        </div>
    </div>
</div>
@endsection