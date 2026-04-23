@extends('layout.admin')

@php
    $pageTitle = 'TA Information';
    $pageDescription = 'Manage Final Project announcements';

    $infos = [
        [
            'id' => 1,
            'title' => 'Panduan Pengajuan Judul TA 2024',
            'author' => 'Admin',
            'description' => 'Informasi lengkap mengenai tata cara pengajuan judul Tugas Akhir untuk mahasiswa tingkat akhir.',
            'date' => '1 Agu 2024',
            'status' => 'Published',
            'published' => true,
        ],
        [
            'id' => 2,
            'title' => 'Jadwal Sidang TA Semester Ganjil',
            'author' => 'Admin',
            'description' => 'Jadwal pelaksanaan sidang Tugas Akhir semester ganjil untuk seluruh program studi.',
            'date' => '15 Sep 2024',
            'status' => 'Published',
            'published' => true,
        ],
        [
            'id' => 3,
            'title' => 'Template Proposal TA Terbaru',
            'author' => 'Admin',
            'description' => 'Template proposal Tugas Akhir yang wajib digunakan oleh mahasiswa.',
            'date' => '20 Jul 2024',
            'status' => 'Published',
            'published' => true,
        ],
        [
            'id' => 4,
            'title' => 'Persyaratan Pengambilan TA',
            'author' => 'Admin',
            'description' => 'Daftar persyaratan akademik dan administratif untuk mengambil mata kuliah Tugas Akhir.',
            'date' => '1 Okt 2024',
            'status' => 'Draft',
            'published' => false,
        ],
        [
            'id' => 5,
            'title' => 'Info Beasiswa Riset TA 2024',
            'author' => 'Admin',
            'description' => 'Program beasiswa untuk mahasiswa yang mengambil topik riset Tugas Akhir tertentu.',
            'date' => '5 Okt 2024',
            'status' => 'Draft',
            'published' => false,
        ],
        [
            'id' => 6,
            'title' => 'Kriteria Penilaian Sidang TA',
            'author' => 'Admin',
            'description' => 'Rincian kriteria penilaian yang digunakan dosen penguji dalam sidang Tugas Akhir.',
            'date' => '10 Jun 2024',
            'status' => 'Published',
            'published' => true,
        ],
    ];

    $totalInfo = count($infos);
    $published = collect($infos)->where('status', 'Published')->count();
    $drafts = collect($infos)->where('status', 'Draft')->count();

    function infoBadgeClass($status) {
        return $status === 'Published'
            ? 'bg-[rgba(61,220,151,0.15)] text-[#3DDC97]'
            : 'bg-[rgba(255,185,0,0.15)] text-[#FFB900]';
    }
@endphp

@section('content')
<div class="space-y-5">
    <!-- Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="rounded-[24px] p-5 flex items-center gap-4 bg-[#242D45] border border-[#3A4566]">
            <div class="w-16 h-16 rounded-2xl bg-[rgba(0,87,184,0.15)] flex items-center justify-center text-[#0057B8]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M7 4h7l5 5v11a1 1 0 01-1 1H7a1 1 0 01-1-1V5a1 1 0 011-1z"/>
                </svg>
            </div>
            <div>
                <p class="text-white text-4xl font-extrabold leading-none">{{ $totalInfo }}</p>
                <p class="text-[#A0A8C0] text-sm mt-2">Total Information</p>
            </div>
        </div>

        <div class="rounded-[24px] p-5 flex items-center gap-4 bg-[#242D45] border border-[#3A4566]">
            <div class="w-16 h-16 rounded-2xl bg-[rgba(61,220,151,0.15)] flex items-center justify-center text-[#3DDC97]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M7 4h7l5 5v11a1 1 0 01-1 1H7a1 1 0 01-1-1V5a1 1 0 011-1z"/>
                </svg>
            </div>
            <div>
                <p class="text-white text-4xl font-extrabold leading-none">{{ $published }}</p>
                <p class="text-[#A0A8C0] text-sm mt-2">Published</p>
            </div>
        </div>

        <div class="rounded-[24px] p-5 flex items-center gap-4 bg-[#242D45] border border-[#3A4566]">
            <div class="w-16 h-16 rounded-2xl bg-[rgba(255,185,0,0.15)] flex items-center justify-center text-[#FFB900]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M7 4h7l5 5v11a1 1 0 01-1 1H7a1 1 0 01-1-1V5a1 1 0 011-1z"/>
                </svg>
            </div>
            <div>
                <p class="text-white text-4xl font-extrabold leading-none">{{ $drafts }}</p>
                <p class="text-[#A0A8C0] text-sm mt-2">Drafts</p>
            </div>
        </div>
    </div>

    <!-- Top Bar -->
    <div class="flex flex-wrap items-center gap-4">
        <div class="relative flex-1 min-w-[320px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-[#A0A8C0]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input
                type="text"
                placeholder="Search by title or description..."
                class="w-full pl-12 pr-4 py-4 rounded-3xl bg-[#242D45] border border-[#3A4566] text-sm text-white outline-none placeholder:text-[#7F89A8] focus:border-[#4DA3FF]"
            >
        </div>

        <select class="min-w-[170px] px-4 py-4 rounded-3xl bg-[#242D45] border border-[#3A4566] text-sm text-[#A0A8C0] outline-none">
            <option>All Status</option>
            <option>Published</option>
            <option>Draft</option>
        </select>

        <button
            onclick="document.getElementById('addInfoModal').classList.remove('hidden')"
            class="inline-flex items-center gap-2 px-6 py-4 rounded-3xl bg-[#0057B8] text-white font-semibold hover:bg-[#0046A0] transition"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Info
        </button>
    </div>

    <!-- Table -->
    <div class="rounded-[26px] overflow-hidden border border-[#3A4566]">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-[#242D45]">
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">No</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Title</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Description</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Date</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Status</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Publish</th>
                        <th class="px-5 py-5 text-left text-xs font-semibold text-[#A0A8C0] border-b border-[#3A4566]">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($infos as $index => $info)
                        <tr class="{{ $index % 2 === 0 ? 'bg-[#1A2035]' : 'bg-[#242D45]' }} border-b border-[#3A4566]">
                            <td class="px-5 py-5 text-[15px] text-[#A0A8C0]">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-5 py-5 max-w-[260px]">
                                <p class="text-white text-[15px] font-medium truncate">{{ $info['title'] }}</p>
                                <p class="text-sm text-[#A0A8C0]">by {{ $info['author'] }}</p>
                            </td>

                            <td class="px-5 py-5 max-w-[340px]">
                                <p class="text-[15px] text-[#A0A8C0] line-clamp-2">{{ $info['description'] }}</p>
                            </td>

                            <td class="px-5 py-5">
                                <div class="flex items-center gap-2 text-[#A0A8C0]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[14px] h-[14px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10m-13 9h16a1 1 0 001-1V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a1 1 0 001 1z"/>
                                    </svg>
                                    <span class="text-sm">{{ $info['date'] }}</span>
                                </div>
                            </td>

                            <td class="px-5 py-5">
                                <span class="px-3 py-1 rounded-full text-sm font-medium {{ infoBadgeClass($info['status']) }}">
                                    {{ $info['status'] }}
                                </span>
                            </td>

                            <td class="px-5 py-5">
                                @if ($info['published'])
                                    <button class="text-[#3DDC97] hover:opacity-80">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-7" viewBox="0 0 40 24" fill="none">
                                            <rect x="1.5" y="1.5" width="37" height="21" rx="10.5" stroke="currentColor" stroke-width="3"/>
                                            <circle cx="28" cy="12" r="5" fill="currentColor"/>
                                        </svg>
                                    </button>
                                @else
                                    <button class="text-[#A0A8C0] hover:opacity-80">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-7" viewBox="0 0 40 24" fill="none">
                                            <rect x="1.5" y="1.5" width="37" height="21" rx="10.5" stroke="currentColor" stroke-width="3"/>
                                            <circle cx="12" cy="12" r="5" fill="currentColor"/>
                                        </svg>
                                    </button>
                                @endif
                            </td>

                            <td class="px-5 py-5">
                                <div class="flex items-center gap-3">
                                    <button onclick="document.getElementById('viewInfoModal').classList.remove('hidden')" class="text-[#4DA3FF] hover:opacity-80">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>

                                    <button onclick="document.getElementById('editInfoModal').classList.remove('hidden')" class="text-[#FFB900] hover:opacity-80">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 4h4a2 2 0 012 2v4m-9.586 9.586L3 21l1.414-4.414L14 7l3 3-9.586 9.586z"/>
                                        </svg>
                                    </button>

                                    <button onclick="document.getElementById('deleteInfoModal').classList.remove('hidden')" class="text-[#FF4D4D] hover:opacity-80">
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
    </div>
</div>

<!-- View Modal -->
<div id="viewInfoModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-4xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">View TA Information</h2>
            <button onclick="document.getElementById('viewInfoModal').classList.add('hidden')" class="text-[#A0A8C0]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="space-y-5">
            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Title</label>
                <input type="text" disabled value="Panduan Pengajuan Judul TA 2024" class="w-full px-4 py-4 rounded-2xl bg-[#1A2035] border border-[#2A3352] text-white/80 outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Description</label>
                <textarea rows="5" disabled class="w-full px-4 py-4 rounded-2xl bg-[#1A2035] border border-[#2A3352] text-white/80 outline-none resize-none">Write a detailed description...</textarea>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Date</label>
                    <input type="text" disabled value="2024-08-01" class="w-full px-4 py-4 rounded-2xl bg-[#1A2035] border border-[#2A3352] text-white/80 outline-none">
                </div>

                <div>
                    <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Status</label>
                    <input type="text" disabled value="Published" class="w-full px-4 py-4 rounded-2xl bg-[#1A2035] border border-[#2A3352] text-white/80 outline-none">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div id="addInfoModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-4xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">Add TA Information</h2>
            <button onclick="document.getElementById('addInfoModal').classList.add('hidden')" class="text-[#A0A8C0]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="space-y-5">
            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Title</label>
                <input type="text" placeholder="Enter announcement title..." class="w-full px-4 py-4 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Description</label>
                <textarea rows="5" placeholder="Write a detailed description..." class="w-full px-4 py-4 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none resize-none"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Date</label>
                    <input type="date" class="w-full px-4 py-4 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none [color-scheme:dark]">
                </div>

                <div>
                    <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Status</label>
                    <select class="w-full px-4 py-4 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
                        <option>Draft</option>
                        <option>Published</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-4 pt-2">
                <button onclick="document.getElementById('addInfoModal').classList.add('hidden')" class="flex-1 py-4 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                    Cancel
                </button>
                <button class="flex-1 py-4 rounded-2xl bg-[#0057B8] text-white text-lg font-semibold">
                    Add Information
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editInfoModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-4xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-white text-2xl font-bold">Edit TA Information</h2>
            <button onclick="document.getElementById('editInfoModal').classList.add('hidden')" class="text-[#A0A8C0]">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="space-y-5">
            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Title</label>
                <input type="text" value="Panduan Pengajuan Judul TA 2024" class="w-full px-4 py-4 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
            </div>

            <div>
                <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Description</label>
                <textarea rows="5" class="w-full px-4 py-4 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none resize-none">Write a detailed description...</textarea>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Date</label>
                    <input type="date" value="2024-08-01" class="w-full px-4 py-4 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none [color-scheme:dark]">
                </div>

                <div>
                    <label class="block text-[#A0A8C0] text-sm font-medium mb-2">Status</label>
                    <select class="w-full px-4 py-4 rounded-2xl bg-[#2A3352] border border-[#3A4566] text-white outline-none">
                        <option selected>Published</option>
                        <option>Draft</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-4 pt-2">
                <button onclick="document.getElementById('editInfoModal').classList.add('hidden')" class="flex-1 py-4 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                    Cancel
                </button>
                <button class="flex-1 py-4 rounded-2xl bg-[#0057B8] text-white text-lg font-semibold">
                    Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteInfoModal" class="hidden fixed inset-0 z-50 bg-[rgba(0,0,0,0.78)] flex items-center justify-center p-4">
    <div class="w-full max-w-2xl rounded-[28px] p-8 bg-[#242D45] border border-[#4B5780]">
        <h2 class="text-white text-2xl font-bold mb-4">Confirm Delete</h2>
        <p class="text-[#A0A8C0] text-[17px] leading-8 mb-8">
            Are you sure you want to delete this information? This action cannot be undone.
        </p>

        <div class="flex gap-4">
            <button onclick="document.getElementById('deleteInfoModal').classList.add('hidden')" class="flex-1 py-4 rounded-2xl border border-[#3A4566] text-[#A0A8C0] text-lg">
                Cancel
            </button>
            <button class="flex-1 py-4 rounded-2xl bg-[#FF4D4D] text-white text-lg font-semibold">
                Delete
            </button>
        </div>
    </div>
</div>
@endsection