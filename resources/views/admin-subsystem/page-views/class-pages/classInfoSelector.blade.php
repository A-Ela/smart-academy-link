@extends('admin-subsystem.template.adminTemplate')

@section('css')
    @vite('resources/css/class-list/classSelector.css')
@endsection

@section('content')
<h1>Select Class and Year</h1>
<div class="container">

    @if($classNames->isEmpty() || $years->isEmpty())
        <!-- Message for no classes -->
        <div class="no-classes-message">
            No classes are currently registered.
        </div>
    @else
        <!-- Form for Class and Year Selection -->
        <form action="{{ route('class-selector.confirm') }}" method="POST">
            @csrf
            <div class="grid">
                <!-- Column for Class Names -->
                <div class="card">
                    <h2>Class Names</h2>
                    @foreach($classNames as $classname)
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="classname" value="{{ $classname }}"> {{ $classname }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- Column for Years -->
                <div class="card">
                    <h2>Years</h2>
                    @foreach($years as $year)
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="year" value="{{ $year }}"> {{ $year }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Confirm Selection</button>
        </form>
    @endif
</div>
@endsection