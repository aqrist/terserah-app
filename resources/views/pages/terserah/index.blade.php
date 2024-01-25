@extends('layouts.terserah')

@section('content')

    <div class="container mt-5">
        <h1 class="mb-4">Mau makan dimana?</h1>


        @if ($history->count() > 0)
            <ul class="list-group mb-2">
                @foreach ($history as $item)
                    <li class="list-group-item">{{ $item->choice }}</li>
                @endforeach
            </ul>
            {{ $history->links() }}
        @else
            <p>No history available.</p>
        @endif

        <form method="post" action="/random-choice">
            @csrf
            <div class="mb-3">
                <label class="form-label">Masukkan pilihan, bisa lebih dari satu (gunakan koma):</label>
                <input type="text" name="choices" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Pilih makan dimana</button>
        </form>

        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif



        @isset($randomChoice)
            <h2 class="mt-4">Jadinya makan di:</h2>
            <p class="lead">{{ $randomChoice }}</p>
        @endisset
    </div>

@endsection
