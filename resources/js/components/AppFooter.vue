<script setup lang="ts">
const phrases = [
    'Made with ❤️ and a dash of magic',
    'Powered by purrs, code, and creativity 🐾✨',
    'Developed with love, coffee, and cat cuddles ☕🐈',
    'Coded under the watchful eyes of my feline supervisor 🐱',
    'Just another pixel-perfect dream in code 💭💻',
    'Programming with a cat on my lap and coffee in hand 🐾☕',
    'Dreamed, built, and launched with a spark 🚀',
    'Fueled by coffee, curiosity, and paw-sitive vibes 🐾☀️',
    'Debugging with a sidekick on my keyboard 🐾⌨️',
    'From cat naps to code maps — always building 💤➡️💡',
];

const selectedPhrase = phrases[Math.floor(Math.random() * phrases.length)];

const currentYear = new Date().getFullYear();
</script>

<template>
    <footer class="border-t bg-background px-6 py-8">
        <div
            class="mx-auto flex w-full max-w-6xl flex-col items-center gap-2 text-center text-sm sm:flex-row sm:justify-between sm:text-left md:text-base"
        >
            <p>{{ selectedPhrase }}.</p>
            <p>© {{ currentYear }} Martha M. Nieto. All rights reserved.</p>
        </div>
    </footer>
</template>
