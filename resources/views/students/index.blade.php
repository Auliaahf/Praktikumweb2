<x-default-layout title="Student" section_title="Students">
    @if (session('success'))
        <div class="bg-green-50 border border-green-500 text-green-500 px-3 py-2">
            {{ session('success') }}
        </div>
    @endif

    @can('store-student')
    <div class="flex">
        <a href="{{ route('students.create') }}"
            class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 flex items-center gap-2">
            <i class="ph ph-plus block text-green-500"></i>
            <div>Add Students</div>
        </a>
    </div>
    @endcan

    <div class="overflow-auto">
        <div class="min-w-full bg-white shadow">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-zinc-200 text-sm leading-normal">
                        <th class="px-3 py-6 text-left">#</th>
                        <th class="px-3 py-6 text-left">Name</th>
                        <th class="px-3 py-6 text-center">ID Numbers</th>
                        <th class="px-3 py-6 text-center">Gender</th>
                        <th class="px-3 py-6 text-center">Majors</th>
                        <th class="px-3 py-6 text-center">Status</th>
                        <th class="px-3 py-6 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-zinc-700 text-sm font-light">
                    @forelse ($students as $student)
                        <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                            <td class="px-3 py-6 text-left">{{ $loop->iteration }}</td>
                            <td class="px-3 py-6 text-left">{{ $student->name }}</td>
                            <td class="px-3 py-6 text-center">{{ $student->student_id_number }}</td>
                            <td class="px-3 py-6 text-center">{{ $student->gender }}</td>
                            <td class="px-3 py-6 text-center">{{ $student->majors->name }}</td>
                            <td class="px-3 py-6 text-center">{{ $student->status }}</td>
                            <td class="px-3 py-6 text-center">
                                @can('edit-student')
                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="bg-yellow-50 border border-yellow-500 px-2 inline-block">
                                    <i class="ph ph-note-pencil block text-yellow-500"></i>
                                </a>
                                @endcan
                                @can('destroy-student')
                                <form onsubmit="return confirm('Are you sure?')" method="POST"
                                        action="{{ route('students.destroy', $student->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-50 border border-red-500 px-2">
                                        <i class="ph ph-trash-simple block text-red-500"></i>
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-zinc-500">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-default-layout>
