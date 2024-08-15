<x-layout>
    <x-slot:heading>
        Edit Course
    </x-slot:heading>
    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="name">Course Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="name" id="name" value="{{ old('name', $course->name) }}"/>
                            <x-form-error name="name"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="maxscore">MaxScore</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="maxscore" id="maxscore" value="{{ old('maxscore', $course->maxscore) }}"/>
                            <x-form-error name="maxscore"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="track_ids">Track Name</x-form-label>
                        <div class="mt-2">
                            <select name="track_ids[]" id="track_ids" multiple>
                                @foreach($tracks as $track)
                                    <option value="{{ $track->id }}" 
                                        @if(in_array($track->id, $course->tracks->pluck('id')->toArray())) selected @endif>
                                        {{ $track->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-form-error name="track_ids"/>
                        </div>
                    </x-form-field>

                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <x-button href="{{ route('courses.index') }}">Cancel</x-button>
                <x-form-button>Save</x-form-button>
            </div>
        </div>
    </form>
</x-layout>
