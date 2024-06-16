@extends('app')

@section('content')
  <navbar></navbar>
  <company-details :company-id="{{ $id }}"></company-details>
  <v-footer class="-mt-6"></vfooter>
@endsection