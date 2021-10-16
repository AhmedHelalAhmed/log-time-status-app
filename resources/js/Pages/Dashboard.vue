<template>
    <app-layout title="Dashboard">
        <template #breadcrumb>
            <t-breadcrumb :breadcrumbStyle="1" :breadcrumbs="breadcrumbs"/>
        </template>
        <template #header>
            Statues
        </template>
        <template #subHeader>
        </template>
        <template #default>

            <!--Table-->
            <t-table :content="tableContent"
                     :searchable="[]"
                     :header="tableHeader"
                     :radius="0"
                     :shadow="false"
                     color="solid-white">
                <template #right>
                    <button
                        @click="showAddModal"
                        class="button bg-green-500 border-green-500 hover:bg-green-100 hover:text-green-700 text-gray-100 hover:bg-green-100 hover:text-green-700 rounded-full h-10"
                        type="button"
                    >
                        <t-plus-icon class="w-5 h-5 -mx-1"/>
                        <svg data-v-5c9d97fe="" data-v-06686206="" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6"><path data-v-5c9d97fe="" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Add
                    </button>
                </template>
                <template #status="{props}">
                    <div class="flex justify-center">
                        <t-progress :value="props.status" color="solid-green"/>
                    </div>
                </template>
            </t-table>
        </template>
    </app-layout>
    <t-modal :show="showModal" @close="showModal = $event">
        <template #header>
            User Deleting
        </template>
        <template #content>
            <span v-html="modalContent"></span>
        </template>
        <template #footer-left>
            <t-button
                design="light"
                color="green"
                @click.native="showModal = false"
            >
                No, Nevermind
            </t-button>
        </template>
        <template #footer-right>
            <form id="delete" @submit.prevent="deleteUser">

                <t-button
                    design="light"
                    color="gray"
                    type="submit">
                    Yes, Delete
                </t-button>
            </form>
        </template>
    </t-modal>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import GridSection from "@/Layouts/GridSection";
    import TStatisticWidget from "@/Components/Card/TStatisticWidget";
    import TCashIcon from "@/Components/Icon/TCashIcon";
    import TShoppingBagIcon from "@/Components/Icon/TShoppingBagIcon";
    import TContentCard from "@/Components/Card/TContentCard";
    import TList from "@/Components/List/TList";
    import TListItem from "@/Components/List/TListItem";
    import TAvatar from "@/Components/Avatar/TAvatar";
    import TTable from "@/Components/Table/TTable";
    import TBreadcrumb from "@/Components/Breadcrumb/TBreadcrumb";
    import TProgress from "@/Components/Progress/TProgress";
    import TAlert from "@/Components/Alert/TAlert";
    import TInformationCircleIcon from "@/Components/Icon/TInformationCircleIcon";
    import TTrashIcon from "@/Components/Icon/TTrashIcon";
    import TCheckCircleIcon from "@/Components/Icon/TCheckCircleIcon";
    import TPlusIcon from "@/Components/Icon/TPlusIcon";
    import TModal from "@/Components/Modal/TModal";
    import TButton from "@/Components/Button/TButton";

    export default defineComponent({
        components: {
            AppLayout,
            TCheckCircleIcon,
            TTrashIcon,
            TInformationCircleIcon,
            TAlert,
            TProgress,
            TBreadcrumb,
            TTable,
            TAvatar,
            TListItem,
            TList,
            TContentCard,
            TShoppingBagIcon,
            TCashIcon,
            TStatisticWidget,
            GridSection,
            TPlusIcon,
            TModal,
            TButton
        },
        data() {
            return {
                tableHeader: [
                    {key: 'id', label: 'Task ID', position: 'center'},
                    {key: 'link', label: 'Task link', position: 'left'},
                    {key: 'description', label: 'Description', position: 'left'},
                ],
                tableContent: [
                    {id: 1, link: '<b>VueJS Components</b>'},
                    {id: 2, link: 'Custom Style Optimize'},
                    {id: 3, link: 'Error Management'},
                ],
                breadcrumbs: [
                    {label: 'Home', link: '/', active: false},
                    {label: 'Statuses', link: '', active: true, activeColor: 'blue'}
                ],
                showModal: false,
                modalContent: null
            }
        },
        methods:{
            showAddModal() {
                this.showModal = true
                this.modalContent = 'testing content'
            },
            deleteUser() {
                this.form.id = this.selectedUser;
                this.form.delete(route('settings-user.destroy', this.selectedUser), {
                    preserveScroll: true,
                    onSuccess: () => this.showModal = false,
                })
            },
        }
    })
</script>
