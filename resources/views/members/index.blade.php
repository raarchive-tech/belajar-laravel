@extends('layouts.app')

@section('title', 'Data Member - Library System')
@section('header', 'Data Member Perpustakaan')

@section('content')
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-bold text-purple-950">Daftar Anggota (Member)</h2>
            <p class="text-sm text-gray-500">Daftar anggota aktif yang terdaftar di sistem perpustakaan.</p>
        </div>
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-purple-100 shadow-sm">
            <span class="text-xs font-medium text-gray-500">Total Member:</span>
            <span class="text-sm font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-500">
                {{ count($members) }}
            </span>
        </div>
    </div>

    <!-- Tabel / Daftar Member -->
    <div class="bg-white rounded-2xl shadow-sm border border-purple-100 overflow-hidden">
        @if(count($members) > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gradient-to-r from-purple-100/80 to-pink-100/60 text-purple-950 text-xs uppercase tracking-wider font-bold border-b border-purple-100">
                            <th class="py-4 px-6 w-20">No</th>
                            <th class="py-4 px-6">Nama Member</th>
                            <th class="py-4 px-6">Status Keanggotaan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-50 text-sm text-gray-700">
                        @foreach($members as $index => $member)
                            @php
                                $memberName = is_object($member) ? ($member->name ?? 'Member') : $member;
                                $memberEmail = is_object($member) && isset($member->email) ? $member->email : null;
                            @endphp
                            <tr class="hover:bg-purple-50/40 transition">
                                <td class="py-4 px-6 font-medium text-gray-500">{{ $index + 1 }}</td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3.5">
                                        <!-- Avatar Inisial Gradasi -->
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-purple-600 to-pink-500 text-white flex items-center justify-center font-bold text-sm shadow-sm shrink-0">
                                            {{ strtoupper(substr($memberName, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-semibold text-purple-950">{{ $memberName }}</p>
                                            @if($memberEmail)
                                                <p class="text-xs text-gray-500">{{ $memberEmail }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-pink-100 text-pink-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-pink-500"></span>
                                        Anggota Aktif
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-pink-50 text-pink-500 flex items-center justify-center text-2xl mb-3">
                    👥
                </div>
                <h3 class="text-base font-bold text-purple-950">Belum Ada Data Member</h3>
                <p class="text-sm text-gray-500 mt-1">Data anggota perpustakaan masih kosong.</p>
            </div>
        @endif
    </div>
@endsection