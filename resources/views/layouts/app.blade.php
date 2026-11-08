<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library System')</title>
    <!-- Menggunakan font Plus Jakarta Sans agar tampilan bersih ala Malaka Books -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: #F8F9FA;
            color: #212529;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Kiri ala Malaka Books */
        .sidebar {
            width: 260px;
            background-color: #FFFFFF;
            border-right: 1px solid #E9ECEF;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
        }

        .sidebar-brand {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 8px;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 14px;
            color: #4B5563;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            background-color: #F3F4F6;
            color: #111827;
            font-weight: 600;
        }

        .sidebar-footer {
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid #E9ECEF;
        }

        .btn-logout {
            width: 100%;
            background: #FEE2E2;
            color: #DC2626;
            border: none;
            padding: 10px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-logout:hover {
            background: #FCA5A5;
        }

        /* Area Konten Utama */
        .main-content {
            margin-left: 260px;
            flex: 1;
            padding: 32px 40px;
        }

        .header-title {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 20px;
        }

        /* Card / Kontainer Putih */
        .card {
            background: #FFFFFF;
            border: 1px solid #E9ECEF;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Banner Unggulan ala Malaka Books */
        .featured-banner {
            background: linear-gradient(135deg, #FFF7ED 0%, #FFEDD5 100%);
            border: 1px solid #FED7AA;
            border-radius: 16px;
            padding: 24px;
            display: flex;
            gap: 20px;
            align-items: center;
            margin-bottom: 24px;
        }

        .featured-badge {
            background: #EA580C;
            color: white;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 8px;
        }

        /* Grid Statistik Dashboard */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-top: 16px;
        }

        .stat-card {
            background: #F9FAFB;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            padding: 16px;
        }

        .stat-card .value {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .stat-card .label {
            font-size: 13px;
            color: #6B7280;
            font-weight: 500;
        }

        /* Utility Buttons & Forms */
        .btn-primary {
            background-color: #EA580C;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #C2410C;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #E9ECEF;
            font-size: 14px;
        }

        th {
            background-color: #F9FAFB;
            color: #4B5563;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- Sidebar Kiri -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            📚 Library System
        </div>
        <ul class="nav-menu">
            <li><a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="/books" class="nav-link {{ request()->is('books*') ? 'active' : '' }}">Books</a></li>
            <li><a href="/categories" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">Categories</a></li>
            <li><a href="/members" class="nav-link {{ request()->is('members*') ? 'active' : '' }}">Members</a></li>
            
            <!-- Tambahkan menu Users dengan pengecekan hak akses (gate) -->
            @can('manage-users')
                <li><a href="/users" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">Users</a></li>
            @endcan
        </ul>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="main-content">
        @yield('content')
    </main>

</body>
</html>