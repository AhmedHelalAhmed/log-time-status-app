<template>
    <app-layout>
        <template #header>Loading Animations and Screens</template>
        <template #subHeader>Pretty and sweet loading indicators</template>
        <template #default>
            <grid-section :col-desktop="1">
                <t-content-card :width="1">
                    <template #title>Click to the buttons for loading screens</template>
                    <template #subTitle>2 animations for buttons' inside and a lot of loading screen options</template>
                    <template #content>
                        <div class="flex flex-wrap gap-2 mt-4 items-center justify-start">
                            <!--Simple Loading Screen with Cogs-->
                            <t-button
                                design="filled"
                                color="green"
                                type="button"
                                @click.native="showLoadingScreenSimpleCogs = !showLoadingScreenSimpleCogs"
                            >
                                Show Loading Screen with Cogs
                            </t-button>
                            <t-loading
                                :radius="3"
                                loading-design="cogs"
                                v-if="showLoadingScreenSimpleCogs"
                                color="white"
                                @close="showLoadingScreenSimpleCogs = $event"
                            />
                            <!--Simple Loading Screen with Bars-->
                            <t-button
                                design="filled"
                                color="indigo"
                                type="button"
                                @click.native="showLoadingScreenSimpleBars = !showLoadingScreenSimpleBars"
                            >
                                Show Loading Screen with Bars
                            </t-button>
                            <t-loading
                                :radius="3"
                                loading-design="three-bars"
                                v-if="showLoadingScreenSimpleBars"
                                color="indigo"
                                @close="showLoadingScreenSimpleBars = $event"
                            />
                            <!--Simple Loading Screen : Dots-->
                            <t-button
                                design="filled"
                                color="blue"
                                type="button"
                                @click.native="showLoadingScreenSimpleDots = !showLoadingScreenSimpleDots"
                            >
                                Show Loading Screen with Dots
                            </t-button>
                            <t-loading
                                :radius="3"
                                loading-design="three-dots"
                                v-if="showLoadingScreenSimpleDots"
                                color="blue"
                                @close="showLoadingScreenSimpleDots = $event"
                            />
                            <!--Closeable Loading Screen-->
                            <t-button
                                design="light"
                                color="black"
                                type="button"
                                @click.native="showLoadingScreenCloseable = !showLoadingScreenCloseable">
                                Closeable Loading Screen
                            </t-button
                            >
                            <t-loading
                                closeable
                                :radius="3"
                                v-if="showLoadingScreenCloseable"
                                :color="selectedColor"
                                @close="showLoadingScreenCloseable = $event"
                            >
                                <div class="flex">
                                    <img
                                        src="https://camo.githubusercontent.com/8321556a8c584594e7eeed9625375cc4639ebbde4bd527b8d150cb212d95dbf6/68747470733a2f2f7461696c61646d696e2e6465762f696d672f6d6973632f30315f7461696c61646d696e2e6a7067">
                                </div>
                                <!--Color Select-->
                                <div class="flex flex-col m-auto">
                                    <div
                                        class="flex flex-row max-w-min mx-auto mt-4 overflow-hidden justify-center bg-gradient-to-tr from-white to-gray-300  p-2 rounded-lg flex-shrink-0 flex-grow-0">
                                        <t-button
                                            size="small"
                                            design="filled"
                                            class="first:rounded-l-lg last:rounded-r-lg overflow-hidden shadow-lg ring-0 active:ring-0 focus:ring-0"
                                            :radius="0"
                                            type="button"
                                            v-for="color in colors" :color="color.key"
                                            @click="changeColor(color.key)"
                                        >
                                            {{ color.label }}
                                        </t-button>
                                    </div>
                                    <div
                                        class="flex w-full justify-center font-semibold text-gray-700 flex-shrink-0 flex-grow-0">
                                        <span class="flex bg-gradient-to-b from-gray-400 to-white px-2 rounded-b-lg">Color Options</span>
                                    </div>
                                </div>
                            </t-loading>
                            <!--Timed Loading Screen For Close-->
                            <t-button
                                design="outline"
                                color="red"
                                type="button"
                                @click.native="showLoadingScreenTimed = !showLoadingScreenTimed"
                            >
                                Timed Loading Screen For Close
                            </t-button>
                            <t-loading
                                :timer="6000"
                                :radius="3"
                                v-if="showLoadingScreenTimed"
                                :color="selectedColor"
                                @close="showLoadingScreenTimed = $event"
                            >
                                <!--Color Select-->
                                <div class="mb-4">
                                    <div class="flex mx-auto justify-center font-semibold text-lg text-gray-800">
                                        <span
                                            class="flex bg-gradient-to-tl from-gray-100 to-white px-2 pt-1 rounded-t-lg">Color Options</span>
                                    </div>
                                    <div
                                        class="flex flex-row max-w-min mx-auto overflow-hidden  bg-gradient-to-tl from-gray-300 to-white p-2 rounded-lg">
                                        <t-button
                                            design="filled"
                                            class="first:rounded-l-lg last:rounded-r-lg overflow-hidden shadow-lg ring-0 active:ring-0 focus:ring-0"
                                            :radius="0"
                                            type="button"
                                            v-for="color in colors" :color="color.key"
                                            @click="changeColor(color.key)"
                                        >
                                            {{ color.label }}
                                        </t-button>
                                    </div>
                                </div>
                                <img class="flex mx-auto h-1/2 w-1/2"
                                     src="https://images.unsplash.com/photo-1585251172245-4e87f155fc30?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=687&q=80">


                            </t-loading>
                        </div>
                    </template>
                </t-content-card>
            </grid-section>
            <!--Sample Codes-->
            <ssh-pre :copy-button="true" label="Code" language="html">{{ sampleCode.html }}</ssh-pre>
            <ssh-pre :copy-button="true" label="JS" language="js">{{ sampleCode.js }}</ssh-pre>
            <!--Variables Table-->
            <t-table
                :content="sampleCode.table.content"
                :header="sampleCode.table.header"
                class="mt-5"
                color="solid-blue"
                :searchable="['variable','details']"
            >
                <template #details="{props}">
              <span class="whitespace-nowrap tablet:whitespace-normal" v-html="props.details">
              </span>
                </template>
            </t-table>
        </template>
    </app-layout>
</template>

<script>
/*Layout*/
import AppLayout from "@/Layouts/AppLayout";
/*Component*/
import GridSection from "@/Layouts/GridSection";
import TTable from "@/Components/Table/TTable";
import TContentCard from "@/Components/Card/TContentCard";
import TModal from "@/Components/Modal/TModal";
import TButton from "@/Components/Button/TButton";
import TInputGroup from "@/Components/Form/TInputGroup";
import TInputText from "@/Components/Form/Inputs/TInputText";
import TList from "@/Components/List/TList";
import TListItem from "@/Components/List/TListItem";
/*Codehighlighter*/
import SshPre from "simple-syntax-highlighter";
import "simple-syntax-highlighter/dist/sshpre.css";
import TLoading from "@/Components/Loading/TLoading";
import TInputSelect from "@/Components/Form/Inputs/TInputSelect";
import {defineComponent, ref} from "vue";

export default defineComponent({
    name: "Modal",
    components: {
        TInputSelect,
        TLoading,
        TListItem,
        TList,
        AppLayout, GridSection, SshPre, TButton, TContentCard, TModal, TTable, TInputGroup, TInputText
    },
    setup() {
        const selectedColor = ref('gray')
        const showLoadingScreenSimpleCogs = ref(false)
        const showLoadingScreenSimpleBars = ref(false)
        const showLoadingScreenSimpleDots = ref(false)
        const showLoadingScreenCloseable = ref(false)
        const showLoadingScreenTimed = ref(false)

        const colors = [
            {key: 'black', label: 'Black'},
            {key: 'blue', label: 'Blue'},
            {key: 'gray', label: 'Gray'},
            {key: 'green', label: 'Green'},
            {key: 'indigo', label: 'Indigo'},
            {key: 'pink', label: 'Pink'},
            {key: 'purple', label: 'Purple'},
            {key: 'white', label: 'White'},
            {key: 'yellow', label: 'Yellow'}
        ]
        const sampleCode = {
            html:
                '<t-modal :radius="3" :show="showModal" color="solid-white" @close="showModal = $event">\n\n' +
                '    <!--Modal Header-->\n' +
                '    <template #header>User Registration</template>\n\n' +
                '    <!--Modal Content-->\n' +
                '    <template #content>\n\n' +
                '        <!--Everything is here: text, component, form, alert, icons-->\n' +
                '        <!--Form Input: Name-->\n' +
                '        <t-input-group class="col-span-12 md:col-span-6" label="Name" labelFor="name">\n' +
                '            <t-input-text id="name" v-model="form.name" placeholder="User name"/>\n' +
                '        </t-input-group>\n' +
                '        <!--Form Input: Email-->\n' +
                '        <t-input-group class="col-span-12 md:col-span-6" label="Email" labelFor="name">\n' +
                '            <t-input-text id="email" v-model="form.email" placeholder="Business mail address"/>\n' +
                '        </t-input-group>\n\n' +
                '    </template>\n\n' +
                '    <!--Footer Left Button Area-->\n' +
                '    <template #footer-left>\n' +
                '        <t-button :radius="3" color="red" size="sm" @click.native="showModal = false">Left\n' +
                '            Button\n' +
                '        </t-button>\n' +
                '    </template>\n\n' +
                '    <!--Footer Center Button Area-->\n' +
                '    <template #footer-center>\n' +
                '        <t-button :radius="3" color="pink" size="sm" @click.native="showModal = false">\n' +
                '            Center Button\n' +
                '        </t-button>\n' +
                '    </template>\n\n' +
                '    <!--Footer Right Button Area-->\n' +
                '    <template #footer-right>\n' +
                '        <t-button :radius="3" color="yellow" size="sm">Right Button</t-button>\n' +
                '    </template>\n\n' +
                '</t-modal>',
            js:
                'import TModal from "@/Components/Modal/TModal";\n' +
                'import TButton from "@/Components/Button/TButton";\n' +
                'import TInputGroup from "@/Components/Form/TInputGroup";\n' +
                'import TInputText from "@/Components/Form/Inputs/TInputText";' +
                '\n' +
                'export default {\n' +
                '  name: "Modal",\n' +
                '  components: {TModal, TButton, TInputGroup, TInputText},\n' +
                '  }',
            table: {
                header: [
                    {key: 'variable', label: 'Variable'},
                    {key: 'type', label: 'Value Type'},
                    {key: 'details', label: 'Details'},
                ],
                content: [
                    {
                        variable: 'show',
                        type: 'Boolean',
                        details: 'You should define a variable in the data and connect to this data'
                    },
                    {
                        variable: 'color',
                        type: 'String',
                        details: "Your modal color theme.<br><b>Options Solid:</b> solid-red, solid-blue, solid-green, solid-yellow, solid-indigo, solid-pink, solid-purple, solid-gray, solid-black, solid-white,<br>" +
                            "<b>Options Light:</b> light-red, light-blue, light-green, light-yellow, light-indigo, light-pink, light-purple, light-gray<br" +
                            "><b>Options Gradient:</b> gradient-red-to-pink. Red is first color and Pink is second color. You change red end pink with red, blue, green, yellow, indigo, pink, purple and gray)"
                    },
                    {
                        variable: 'gradient-direction',
                        type: 'String',
                        details: "If you use to the gradient color, you can select gradient's direction. <br><b>Options:</b> r, l, b, t, tl, bl, tr, br<br>" +
                            "<b>Default:</b> r<br>(Means: l: left, r: right, b: bottom, t: top)"
                    },
                    {
                        variable: ":radius",
                        type: "Number",
                        details: "<b>Options:</b> none, 1, 2, 3, 4, 5, 6, 7, 8"
                    },
                    {
                        variable: '@close="showModal = $event"',
                        type: 'Connector',
                        details: 'You should change "showModal" with created new data variables for "show variable". You should add to t-modal element.'
                    },
                    {
                        variable: '@click.native="showModal = false"',
                        type: 'Connector',
                        details: 'You should change "showModal" with created new data variables for "show variable". This is for close button event. You can add any buttons and element.'
                    }
                ]
            }
        }

        const changeColor = (color) => {
            selectedColor.value = color
        }

        return {selectedColor, changeColor, colors, sampleCode,showLoadingScreenSimpleBars,showLoadingScreenSimpleDots,showLoadingScreenSimpleCogs,showLoadingScreenCloseable,showLoadingScreenTimed}
    }
})
</script>
