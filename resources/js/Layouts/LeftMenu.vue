<template>
    <aside class="flex flex-col justify-between h-full absolute">
        <!--Logo-->
        <div class="left-menu-logo">
            <Link
                :href="route('dashboard')">
                <div class="flex justify-center items-center space-x-1 space-y-1">
                    <div class="flex justify-between h-10 overflow-hidden mx-4">
                        <t-logo class="w-10 h-10 text-white"/>
                        <transition name="left-menu">
                            <div v-if="showingLeftMenu === 'true'" class="flex text-3xl text-white h-10 items-center">
                                Status
                            </div>
                        </transition>
                    </div>
                </div>
            </Link>
        </div>
        <!--Menu Items-->
        <nav
            class="h-full mt-6 px-1 overflow-y-auto text-gray-500 scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-gray-300 overflow-y-scroll">
            <slot/>
        </nav>
        <!--Left Menu Footer-->
        <div class="flex flex-row text-gray-500">

        </div>

    </aside>
</template>

<script>
import {defineComponent} from "vue";
import TLogo from "@/Components/Icon/TLogo";
import TCogIcon from "@/Components/Icon/TCogIcon";
import {Link} from '@inertiajs/inertia-vue3';

export default defineComponent({
    name: "LeftMenu",
    components: {
        TCogIcon,
        TLogo,
        Link
    },
    props: ['showingLeftMenu']
})
</script>
<style>
.left-menu-enter-active, .left-menu-leave-active {
    transition: all .75s;
}

.left-menu-enter, .left-menu-leave-to {
    opacity: 0;
    max-width: 0;
}

.left-menu-enter-to, .left-menu-leave {
    opacity: 1;
    max-width: 500px;
}
</style>
