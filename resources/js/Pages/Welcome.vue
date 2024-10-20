<script setup lang="ts">
import { Head, Link } from "@inertiajs/vue3";

defineProps<{
  canLogin?: boolean;
  canRegister?: boolean;
  laravelVersion: string;
  phpVersion: string;
}>();

function handleImageError() {
  document.getElementById("screenshot-container")?.classList.add("!hidden");
  document.getElementById("docs-card")?.classList.add("!row-span-1");
  document.getElementById("docs-card-content")?.classList.add("!flex-row");
  document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
  <Head title="Welcome" />
  <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div
      class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
    >
      <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
        <header class="top-0 left-0 fixed w-full bg-white dark:bg-gray-700 p-5">
          <div class="flex lg:justify-center lg:col-start-2"></div>
          <nav v-if="canLogin" class="flex flex-1">
            <Link
              v-if="$page.props.auth.user"
              href="/dashboard"
              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
              Dashboard
            </Link>

            <template v-else>
              <Link
                href="/login"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
              >
                Log in
              </Link>

              <Link
                v-if="canRegister"
                href="/register"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
              >
                Register
              </Link>
            </template>
          </nav>
        </header>

        <main
          class="mt-6 h-full w-full flex flex-col justify-center items-center"
        >
          <div
            class="w-1/2 h-[20em] text-center flex flex-col justify-center items-center bg-white dark:bg-gray-600 p-5 shadow-md"
          >
            <p class="font-bold text-black dark:text-gray-200 text-2xl">
              Welcome to COTE TimeSheet
            </p>
          </div>
        </main>

        <footer class="py-16 text-center text-sm text-black dark:text-white/70">
          Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
      </div>
    </div>
  </div>
</template>
