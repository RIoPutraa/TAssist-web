@extends('layout.admin')

@php
    $pageTitle = 'Supervisor Quota';
    $pageDescription = 'Monitor and manage supervision slots';

    $lecturers = [
        [
            'initial' => 'S',
            'name' => 'Dr. Budi Santoso',
            'specialization' => 'Artificial Intelligence',
            'department' => 'Informatika',
            'max' => 5,
            'current' => 3,
        ],
        [
            'initial' => 'L',
            'name' => 'Dr. Dewi Lestari',
            'specialization' => 'Database Systems',
            'department' => 'Sistem Informasi',
            'max' => 4,
            'current' => 2,
        ],
        [
            'initial' => 'P',
            'name' => 'Prof. Eko Prasetyo',
            'specialization' => 'Embedded Systems',
            'department' => 'Teknik Elektro',
            'max' => 4,
            'current' => 4,
        ],
        [
            'initial' => 'H',
            'name' => 'Dr. Fitriani Hasanah',
            'specialization' => 'Power Systems',
            'department' => 'Teknik Elektro',
            'max' => 5,
            'current' => 1,
        ],
        [
            'initial' => 'P',
            'name' => 'Dr. Gunawan Putra',
            'specialization' => 'Computer Networks',
            'department' => 'Informatika',
            'max' => 3,
            'current' => 0,
        ],
        [
            'initial' => 'H',
            'name' => 'Prof. Handayani',
            'specialization' => 'Information Security',
            'department' => 'Sistem Informasi',
            'max' => 5,
            'current' => 3,
        ],
        [
            'initial' => 'M',
            'name' => 'Dr. Irfan Maulana',
            'specialization' => 'Machine Learning',
            'department' => 'Informatika',
            'max' => 4,
            'current' => 2,
        ],
        [
            'initial' => 'S',
            'name' => 'Dr. Juliana Sari',
            'specialization' => 'Business Intelligence',
            'department' => 'Sistem Informasi',
            'max' => 5,
            'current' => 5,
        ],
    ];

    $totalLecturers = count($lecturers);
    $totalSlots = collect($lecturers)->sum('max');
    $usedSlots = collect($lecturers)->sum('current');
    $availableSlots = $totalSlots - $usedSlots;
    $usedPercent = $totalSlots > 0 ? round(($usedSlots / $totalSlots) * 100) : 0;
@endphp

@section('content')
<div class="space-y-5">
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="rounded-2xl p-5 flex items-center gap-4 bg-[#242D45] border border-[#3A4566] border-l-4 border-l-[#0057B8]">
            <div class="w-12 h-12 rounded-2xl bg-[rgba(0,87,184,0.15)] flex items-center justify-center text-[#0057B8] text-2xl font-bold">
                {{ $totalLecturers }}
            </div>
            <div>
                <p class="text-[#A0A8C0] text-sm">Total Lecturers</p>
            </div>
        </div>

        <div class="rounded-2xl p-5 flex items-center gap-4 bg-[#242D45] border border-[#3A4566] border-l-4 border-l-[#4DA3FF]">
            <div class="w-12 h-12 rounded-2xl bg-[rgba(77,163,255,0.15)] flex items-center justify-center text-[#4DA3FF] text-2xl font-bold">
                {{ $totalSlots }}
            </div>
            <div>
                <p class="text-[#A0A8C0] text-sm">Total Quota Slots</p>
            </div>
        </div>

        <div class="rounded-2xl p-5 flex items-center gap-4 bg-[#242D45] border border-[#3A4566] border-l-4 border-l-[#FFB900]">
            <div class="w-12 h-12 rounded-2xl bg-[rgba(255,185,0,0.15)] flex items-center justify-center text-[#FFB900] text-2xl font-bold">
                {{ $usedSlots }}
            </div>
            <div>
                <p class="text-[#A0A8C0] text-sm">Currently Assigned</p>
            </div>
        </div>

        <div class="rounded-2xl p-5 flex items-center gap-4 bg-[#242D45] border border-[#3A4566] border-l-4 border-l-[#3DDC97]">
            <div class="w-12 h-12 rounded-2xl bg-[rgba(61,220,151,0.15)] flex items-center justify-center text-[#3DDC97] text-2xl font-bold">
                {{ $availableSlots }}
            </div>
            <div>
                <p class="text-[#A0A8C0] text-sm">Available Slots</p>
            </div>
        </div>
    </div>

    <!-- Overall Progress -->
    <div class="rounded-[24px] p-5 bg-[#242D45] border border-[#3A4566]">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-white text-xl font-bold">Overall Quota Utilization</h3>
            <span class="text-[#4DA3FF] text-xl font-semibold">{{ $usedPercent }}% used</span>
        </div>

        <div class="h-4 rounded-full overflow-hidden bg-[#3A4566]">
            <div
                class="h-full rounded-full"
                style="width: {{ $usedPercent }}%; background: linear-gradient(90deg, #0057B8, #4DA3FF);"
            ></div>
        </div>

        <div class="flex items-center justify-between mt-3 text-sm text-[#A0A8C0]">
            <span>{{ $usedSlots }} assigned</span>
            <span>{{ $availableSlots }} remaining of {{ $totalSlots }} total</span>
        </div>
    </div>

    <!-- Search -->
    <div class="relative max-w-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 absolute left-4 top-1/2 -translate-y-1/2 text-[#A0A8C0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input
            type="text"
            placeholder="Search lecturer or department..."
            class="w-full pl-11 pr-4 py-3 rounded-2xl bg-[#242D45] border border-[#3A4566] text-sm text-white outline-none placeholder:text-[#7F89A8] focus:border-[#4DA3FF]"
        >
    </div>

    <!-- Table -->
    <div class="rounded-[24px] overflow-hidden border border-[#3A4566]">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-[#242D45]">
                        <th class="px-4 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Lecturer Name</th>
                        <th class="px-4 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Department</th>
                        <th class="px-4 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Max Quota</th>
                        <th class="px-4 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Current Students</th>
                        <th class="px-4 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Remaining Slots</th>
                        <th class="px-4 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Quota Progress</th>
                        <th class="px-4 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Status</th>
                        <th class="px-4 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($lecturers as $index => $lecturer)
                        @php
                            $remaining = $lecturer['max'] - $lecturer['current'];
                            $pct = $lecturer['max'] > 0 ? round(($lecturer['current'] / $lecturer['max']) * 100) : 0;
                            $isFull = $remaining <= 0;
                            $isWarning = $pct > 70 && !$isFull;

                            if ($isFull) {
                                $progressColor = '#FF4D4D';
                                $statusBg = 'rgba(255,77,77,0.15)';
                                $statusColor = '#FF4D4D';
                                $statusText = 'Full';
                            } else {
                                $progressColor = $isWarning ? '#FFB900' : '#3DDC97';
                                $statusBg = 'rgba(61,220,151,0.15)';
                                $statusColor = '#3DDC97';
                                $statusText = $remaining . ' available';
                            }

                            $remainingColor = $remaining === 0 ? '#FF4D4D' : ($remaining <= 1 ? '#FFB900' : '#3DDC97');
                        @endphp

                        <tr class="{{ $index % 2 === 0 ? 'bg-[#1A2035]' : 'bg-[#242D45]' }} border-b border-[#3A4566]">
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-11 h-11 rounded-full bg-[#0057B8] flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                                        {{ $lecturer['initial'] }}
                                    </div>
                                    <div>
                                        <p class="text-white text-[15px] font-medium">{{ $lecturer['name'] }}</p>
                                        <p class="text-sm text-[#A0A8C0]">{{ $lecturer['specialization'] }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-4 text-[15px] text-[#A0A8C0]">
                                {{ $lecturer['department'] }}
                            </td>

                            <td class="px-4 py-4 text-white text-[15px] font-semibold">
                                {{ $lecturer['max'] }}
                            </td>

                            <td class="px-4 py-4 text-white text-[15px] font-medium">
                                {{ $lecturer['current'] }}
                            </td>

                            <td class="px-4 py-4">
                                <span class="text-[15px] font-semibold" style="color: {{ $remainingColor }}">
                                    {{ $remaining }}
                                </span>
                            </td>

                            <td class="px-4 py-4 min-w-[180px]">
                                <div class="w-full">
                                    <div class="flex items-center justify-between text-xs text-[#A0A8C0] mb-2">
                                        <span>{{ $pct }}%</span>
                                        <span style="color: {{ $progressColor }}">{{ $lecturer['current'] }}/{{ $lecturer['max'] }}</span>
                                    </div>
                                    <div class="h-2.5 rounded-full overflow-hidden bg-[#3A4566]">
                                        <div class="h-full rounded-full" style="width: {{ $pct }}%; background-color: {{ $progressColor }}"></div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-4">
                                <span class="px-3 py-1.5 rounded-full text-sm font-medium whitespace-nowrap" style="background-color: {{ $statusBg }}; color: {{ $statusColor }}">
                                    {{ $statusText }}
                                </span>
                            </td>

                            <td class="px-4 py-4">
                                <button
                                    onclick="document.getElementById('editQuotaModal').classList.remove('hidden')"
                                    class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium text-[#4DA3FF] bg-[rgba(0,87,184,0.15)] border border-[rgba(77,163,255,0.2)] hover:bg-[rgba(0,87,184,0.3)] transition"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[13px] h-[13px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 4h4a2 2 0 012 2v4m-9.586 9.586L3 21l1.414-4.414L14 7l3 3-9.586 9.586z"/>
                                    </svg>
                                    Edit Quota
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Quota Modal -->
<div id="editQuotaModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">Edit Quota</h2>
            <button onclick="document.getElementById('editQuotaModal').classList.add('hidden')" class="text-[#A0A8C0]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="rounded-2xl bg-[#2A3352] p-5 mb-5">
            <div class="flex justify-between text-sm mb-3">
                <span class="text-[#A0A8C0]">Lecturer</span>
                <span class="text-white font-semibold">Dr. Budi Santoso</span>
            </div>
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
            <button onclick="document.getElementById('editQuotaModal').classList.add('hidden')" class="flex-1 py-3 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                Cancel
            </button>
            <button class="flex-1 py-3 rounded-2xl bg-[#0057B8] text-white text-lg font-semibold">
                Save Changes
            </button>
        </div>
    </div>
</div>
@endsection