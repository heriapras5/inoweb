<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Admin INOWEB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md mx-4">
        <div class="text-center mb-8">
            <a href="/" class="text-3xl font-bold text-[#0a192f]">INO<span class="text-blue-500">WEB</span></a>
            <p class="text-[#64748b] mt-2 text-sm">Masuk ke panel admin</p>
        </div>
        <form method="POST" action="{{ route('login') }}" class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 space-y-5">
            @csrf
            @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">{{ $errors->first('email') }}</div>
            @endif
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required autofocus>
            </div>
            <div>
                <label class="block text-sm font-medium text-[#1a1a2e] mb-1.5">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none" required>
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 text-sm text-[#64748b]">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    Ingat saya
                </label>
            </div>
            <button type="submit" class="w-full bg-[#0a192f] text-white py-2.5 rounded-xl text-sm font-medium hover:bg-[#0f2a4a] transition-colors">Masuk</button>
        </form>
    </div>
</body>
</html>
