<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f4f6f9;
    }
    .dashboard-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        padding: 40px;
    }
    .dashboard-header {
        font-size: 2rem;
        font-weight: 600;
        color: #1e293b;
    }
    .subtext {
        font-size: 1rem;
        color: #64748b;
    }
    .btn-group-custom {
        margin-top: 30px;
    }
    .btn-custom {
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 500;
        transition: 0.2s ease-in-out;
    }
    .btn-logout {
        background-color: #ef4444;
        color: white;
        border: none;
    }
    .btn-logout:hover {
        background-color: #dc2626;
    }
    .btn-manage {
        background-color: #2563eb;
        color: white;
        border: none;
        margin-right: 10px;
    }
    .btn-manage:hover {
        background-color: #1d4ed8;
    }
</style>

<div class="container py-5">
    <div class="dashboard-card mx-auto" style="max-width: 700px;">
        <div class="text-center">
            <h1 class="dashboard-header">Admin Dashboard</h1>
            <p class="subtext">You are logged in as <strong>Admin</strong></p>
        </div>

        <div class="btn-group-custom d-flex justify-content-center">
            <a href="{{ route('admin.packages.index') }}" class="btn btn-custom btn-manage">
                📦 Manage Packages
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-custom btn-logout">
                    🔒 Logout
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
