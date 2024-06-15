@extends('app')

@section('content')
  <navbar></navbar>
  <job-details :job-id="{{ $id }}"></job-details>
  <v-footer class="-mt-6"></vfooter>
@endsection