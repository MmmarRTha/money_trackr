import { router } from '@inertiajs/vue3';
import { toast } from 'vue-sonner';
import type { FlashToast } from '@/types/ui';

export function initializeFlashToast(): void {
    router.on('flash', (event) => {
        const flash = (event as CustomEvent).detail?.flash;
        const toastData = flash?.toast as FlashToast | undefined;

        if (toastData) {
            toast[toastData.type](toastData.message);

            return;
        }

        if (flash?.success) {
            toast.success(flash.success);
        }
    });
}
