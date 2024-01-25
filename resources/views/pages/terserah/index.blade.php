@extends('layouts.terserah')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Mau makan dimana?</h1>

        <div class="accordion mb-3" id="historyAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="historyHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#historyCollapse" aria-expanded="true" aria-controls="historyCollapse">
                        History
                    </button>
                </h2>
                <div id="historyCollapse" class="accordion-collapse collapse hide" aria-labelledby="historyHeading">
                    <div class="accordion-body">
                        @if ($history->count() > 0)
                            <ul class="list-group">
                                @foreach ($history as $item)
                                    <li class="list-group-item">{{ $item->choice }}</li>
                                @endforeach
                            </ul>
                            {{ $history->links() }}
                        @else
                            <p>No history available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <form method="post" action="/random-choice">
            @csrf
            <div class="mb-3">
                <label for="choices" class="form-label">Masukan pilihan, bisa lebih dari satu (gunakan koma):</label>
                <input type="text" name="choices" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Pilih makan dimana</button>
        </form>

        {{-- <form method="get" action="/return-to-previous" class="mt-3">
            <button type="submit" class="btn btn-secondary">Kembali</button>
        </form> --}}

        @isset($randomChoice)
            <h2 class="mt-4">Jadinya makan di:</h2>
            <p class="lead">{{ $randomChoice }}</p>
        @endisset
    </div>

@endsection
