@extends('layout.admin')

@php
    $pageTitle = 'Dashboard';
    $pageDescription = 'Welcome back, Administrator!';
@endphp

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
        <div class="rounded-2xl p-5 flex items-start gap-4 bg-[#242D45] border border-[#3A4566] border-l-4 border-l-[#0057B8]">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-[rgba(0,87,184,0.15)]">
                <span class="text-[#0057B8] text-xl">👥</span>
            </div>
            <div>
                <p class="text-sm mb-1 text-[#A0A8C0] font-medium">Total Students</p>
                <p class="text-white text-2xl font-extrabold">120</p>
                <p class="text-xs mt-1 text-[#3DDC97]">+3 this month</p>
            </div>
        </div>

        <div class="rounded-2xl p-5 flex items-start gap-4 bg-[#242D45] border border-[#3A4566] border-l-4 border-l-[#4DA3FF]">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-[rgba(77,163,255,0.15)]">
                <span class="text-[#4DA3FF] text-xl">🎓</span>
            </div>
            <div>
                <p class="text-sm mb-1 text-[#A0A8C0] font-medium">Total Lecturers</p>
                <p class="text-white text-2xl font-extrabold">24</p>
                <p class="text-xs mt-1 text-[#3DDC97]">+1 this month</p>
            </div>
        </div>

        <div class="rounded-2xl p-5 flex items-start gap-4 bg-[#242D45] border border-[#3A4566] border-l-4 border-l-[#3DDC97]">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-[rgba(61,220,151,0.15)]">
                <span class="text-[#3DDC97] text-xl">✅</span>
            </div>
            <div>
                <p class="text-sm mb-1 text-[#A0A8C0] font-medium">Available Slots</p>
                <p class="text-white text-2xl font-extrabold">16</p>
            </div>
        </div>

        <div class="rounded-2xl p-5 flex items-start gap-4 bg-[#242D45] border border-[#3A4566] border-l-4 border-l-[#FFB900]">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-[rgba(255,185,0,0.15)]">
                <span class="text-[#FFB900] text-xl">📘</span>
            </div>
            <div>
                <p class="text-sm mb-1 text-[#A0A8C0] font-medium">Active Submissions</p>
                <p class="text-white text-2xl font-extrabold">12</p>
                <p class="text-xs mt-1 text-[#3DDC97]">+5 this week</p>
            </div>
        </div>
    </div>

    <!-- Chart + Quick Actions -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
        <div class="xl:col-span-2 rounded-2xl p-5 bg-[#242D45] border border-[#3A4566]">
            <div class="mb-5">
                <h3 class="text-white text-sm font-bold">TA Submissions Overview</h3>
                <p class="text-xs mt-0.5 text-[#A0A8C0]">Monthly student submissions & approvals</p>
            </div>

            <div class="h-[220px] rounded-xl bg-[#2A3352] border border-[#3A4566] flex items-center justify-center text-[#A0A8C0] text-sm">
                Chart area
            </div>
        </div>

        <div class="rounded-2xl p-5 bg-[#242D45] border border-[#3A4566]">
            <h3 class="text-white text-sm mb-4 font-bold">Quick Actions</h3>
            <div class="space-y-3">
                <a href="/students" class="w-full flex items-center gap-3 p-3 rounded-xl bg-[#2A3352] border border-[#3A4566] hover:border-[#0057B8] transition">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-[rgba(0,87,184,0.15)]">
                        <span class="text-[#0057B8]">👤</span>
                    </div>
                    <span class="text-white text-sm flex-1 font-medium">Add Student</span>
                    <span class="text-[#A0A8C0]">→</span>
                </a>

                <a href="/lecturers" class="w-full flex items-center gap-3 p-3 rounded-xl bg-[#2A3352] border border-[#3A4566] hover:border-[#4DA3FF] transition">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-[rgba(77,163,255,0.15)]">
                        <span class="text-[#4DA3FF]">🎓</span>
                    </div>
                    <span class="text-white text-sm flex-1 font-medium">Add Lecturer</span>
                    <span class="text-[#A0A8C0]">→</span>
                </a>

                <a href="/supervisor-quota" class="w-full flex items-center gap-3 p-3 rounded-xl bg-[#2A3352] border border-[#3A4566] hover:border-[#3DDC97] transition">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-[rgba(61,220,151,0.15)]">
                        <span class="text-[#3DDC97]">⚙️</span>
                    </div>
                    <span class="text-white text-sm flex-1 font-medium">Set Quota</span>
                    <span class="text-[#A0A8C0]">→</span>
                </a>

                <a href="/ta-information" class="w-full flex items-center gap-3 p-3 rounded-xl bg-[#2A3352] border border-[#3A4566] hover:border-[#FFB900] transition">
                    <div class="w-9 h-9 rounded-lg flex items-center justify-center bg-[rgba(255,185,0,0.15)]">
                        <span class="text-[#FFB900]">📄</span>
                    </div>
                    <span class="text-white text-sm flex-1 font-medium">Post TA Info</span>
                    <span class="text-[#A0A8C0]">→</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Students + Recent Activity -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
        <div class="xl:col-span-2 rounded-2xl p-5 bg-[#242D45] border border-[#3A4566]">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-white text-sm font-bold">Recent Students</h3>
                <a href="/students" class="text-xs text-[#4DA3FF]">View All →</a>
            </div>

            <div class="space-y-1">
                <div class="grid grid-cols-12 gap-2 px-3 py-2 text-xs text-[#A0A8C0] font-medium">
                    <span class="col-span-4">Name</span>
                    <span class="col-span-3">Department</span>
                    <span class="col-span-3">Supervisor</span>
                    <span class="col-span-2">Status</span>
                </div>

                <div class="grid grid-cols-12 gap-2 px-3 py-2.5 rounded-xl text-sm items-center bg-[#2A3352]">
                    <div class="col-span-4 flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs text-white bg-[#0057B8] font-bold">A</div>
                        <span class="text-white text-xs truncate font-medium">Andi Saputra</span>
                    </div>
                    <span class="col-span-3 text-xs truncate text-[#A0A8C0]">Informatics</span>
                    <span class="col-span-3 text-xs truncate text-[#A0A8C0]">Dr. Budi</span>
                    <div class="col-span-2">
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-[rgba(77,163,255,0.15)] text-[#4DA3FF]">
                            In Progress
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-2 px-3 py-2.5 rounded-xl text-sm items-center">
                    <div class="col-span-4 flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs text-white bg-[#0057B8] font-bold">S</div>
                        <span class="text-white text-xs truncate font-medium">Siti Rahma</span>
                    </div>
                    <span class="col-span-3 text-xs truncate text-[#A0A8C0]">Information System</span>
                    <span class="col-span-3 text-xs truncate text-[#A0A8C0]">Dr. Lina</span>
                    <div class="col-span-2">
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-[rgba(61,220,151,0.15)] text-[#3DDC97]">
                            Approved
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl p-5 bg-[#242D45] border border-[#3A4566]">
            <div class="flex items-center gap-2 mb-4">
                <span class="text-[#4DA3FF]">📈</span>
                <h3 class="text-white text-sm font-bold">Recent Activity</h3>
            </div>

            <div class="space-y-3">
                <div class="flex items-start gap-3">
                    <div class="w-2 h-2 rounded-full mt-1.5 bg-[#0057B8]"></div>
                    <div>
                        <p class="text-white text-xs font-medium">New student added</p>
                        <p class="text-xs text-[#A0A8C0]">Andi Saputra</p>
                        <p class="text-xs mt-0.5 text-[#4DA3FF]">2 hours ago</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-2 h-2 rounded-full mt-1.5 bg-[#3DDC97]"></div>
                    <div>
                        <p class="text-white text-xs font-medium">Quota updated</p>
                        <p class="text-xs text-[#A0A8C0]">Dr. Budi</p>
                        <p class="text-xs mt-0.5 text-[#4DA3FF]">5 hours ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Lecturer Quota -->
    <div class="rounded-2xl p-5 bg-[#242D45] border border-[#3A4566]">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-white text-sm font-bold">Lecturer Quota Overview</h3>
            <a href="/supervisor-quota" class="text-xs text-[#4DA3FF]">Manage →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            <div class="p-4 rounded-xl bg-[#2A3352] border border-[#3A4566]">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs text-white bg-[#0057B8] font-bold">B</div>
                    <div>
                        <p class="text-white text-xs font-semibold">Dr. Budi</p>
                        <p class="text-xs text-[#A0A8C0]">Informatics</p>
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs mb-2">
                    <span class="text-[#A0A8C0]">3/5 students</span>
                    <span class="font-semibold text-[#3DDC97]">60%</span>
                </div>
                <div class="h-1.5 rounded-full overflow-hidden bg-[#3A4566]">
                    <div class="h-full rounded-full bg-[#3DDC97]" style="width: 60%"></div>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-[#2A3352] border border-[#3A4566]">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs text-white bg-[#0057B8] font-bold">L</div>
                    <div>
                        <p class="text-white text-xs font-semibold">Dr. Lina</p>
                        <p class="text-xs text-[#A0A8C0]">Information System</p>
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs mb-2">
                    <span class="text-[#A0A8C0]">5/5 students</span>
                    <span class="font-semibold text-[#FF4D4D]">100%</span>
                </div>
                <div class="h-1.5 rounded-full overflow-hidden bg-[#3A4566]">
                    <div class="h-full rounded-full bg-[#FF4D4D]" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection