<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" defer></script>
    <style>
        /* Full Background Logo */
        .bg-logo {
            background-image: url('https://via.placeholder.com/1920x1080'); /* Ganti dengan URL logo Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        /* Typewriter Container */
        .typewriter-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
        }

        .typewriter {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            border-right: 0.15em solid orange; /* Cursor effect */
        }
    </style>
</head>
<body class="relative bg-gray-100 dark:bg-gray-900 overflow-hidden">

    <!-- Background Logo -->
    <div class="bg-logo"></div>

    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-md fixed w-full top-0 left-0 z-10">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{url('/')}}">
                    <img src="https://via.placeholder.com/150x50" alt="Logo" class="h-10">
                </a>
            </div>
            <div class="flex space-x-6">
                <a href="{{ route('login') }}" class="text-gray-800 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400">Login</a>
                <a href="{{ route('laporan') }}" class="text-gray-800 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400">Laporan</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="typewriter-container">
        <div class="typewriter" id="typewriter"></div>
    </section>

    <script>
        // Typewriter Effect Function
        function typeWriter(element, text, delay, callback) {
            let index = 0;
            let isDeleting = false;
            let speed = 100;
            const typingSpeed = 100;
            const deletingSpeed = 50;

            function type() {
                const fullText = text;
                if (isDeleting) {
                    element.textContent = fullText.substring(0, index--);
                    speed = deletingSpeed;
                } else {
                    element.textContent = fullText.substring(0, index++);
                    speed = typingSpeed;
                }

                if (!isDeleting && index === fullText.length) {
                    isDeleting = true;
                    speed = delay; // Delay before deleting starts
                } else if (isDeleting && index === 0) {
                    isDeleting = false;
                    speed = delay; // Delay before typing starts again
                    if (callback) callback(); // Call callback after delay
                }

                setTimeout(type, speed);
            }

            type();
        }

        // Start Typewriter Effect
        const typewriterElement = document.getElementById('typewriter');
        typeWriter(typewriterElement, 'Selamat Datang di Perusahaan Software', 2000, function() {
            // Optional callback to perform actions after the typewriter effect is done
        });
    </script>

</body>
</html>
