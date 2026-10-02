<div x-data>
    <template x-for="(notification, index) in $store.notifications.notifications" :key="notification.id">
        <div x-show="notification.show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90 translate-y-2" x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90" @click="$store.notifications.removeNotification(notification.id)"
            :class="notification.type === 'success' ? 'border-success/40 text-success' : 'border-error/40 text-error'"
            class="fixed flex items-center gap-2 bg-background-secondary border px-4 py-3 rounded-lg shadow-[0_8px_24px_-8px_rgb(0_0_0_/_0.5)] mb-4 z-50 cursor-pointer max-w-sm"
            :style="'top: ' + (20 + index * 64) + 'px;left: 50%; transform: translateX(-50%);'">
            <span class="badge-dot" :style="'background:currentColor'"></span>
            <p class="text-sm font-medium" x-text="notification.message"></p>
        </div>
    </template>
</div>
