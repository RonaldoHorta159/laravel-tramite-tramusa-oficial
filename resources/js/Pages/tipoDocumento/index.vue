<script>
export default {
    name: 'TipoDocumentoindex',
}
</script>

<script setup>

import { ref } from 'vue'
import { router } from '@inertiajs/vue3'   // <— agrega esto
import AppLayout from '@/layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'


defineProps({
    tipoDocumentos: {
        type: Object,
        required: true
    }
})

// Estado del modal
const showModal = ref(false)
const openModal = () => showModal.value = true
const closeModal = () => showModal.value = false

// Formulario para crear (ejemplo)
const form = ref({ name: '', price: '', category: '', description: '' })

// Acción para crear — ajusta según tu ruta
const submitForm = () => {
    router.post(
        route('tipoDocumento.store'),
        { descripcion: form.value.descripcion },
        {
            onSuccess: () => {
                form.value.descripcion = ''
                showModal.value = false
            }
        }
    )
}
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Tipos de documentos
            </h1>
        </template>

        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="p-6 bg-white border-b border-gray-200 rounded-lg">
                    <div class="flex justify-between">
                        <button @click="openModal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Crear nuevo tipo
                        </button>
                    </div>

                    <div class="mt-4">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Documento nombre
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="tipo in tipoDocumentos.data" :key="tipo.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ tipo.descripcion }}
                                        </th>
                                        <td class="px-6 py-4 text-right space-x-4">
                                            <Link :href="route('tipoDocumento.edit', tipo.id)"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Edit
                                            </Link>

                                            <Link @click="deleteTipo(tipo.id)"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                            Delete
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- Overlay -->
                                <div v-if="showModal"
                                    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                    <!-- Contenedor modal -->
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-sm">

                                            <!-- Header -->
                                            <div
                                                class="flex items-center justify-between p-4 border-b dark:border-gray-600 border-gray-200">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Crear Tipo de Documento
                                                </h3>
                                                <button @click="closeModal"
                                                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                    ✕
                                                </button>
                                            </div>

                                            <!-- Body / Form -->
                                            <form @submit.prevent="submitForm" class="p-4 space-y-4">
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Descripción
                                                    </label>
                                                    <input v-model="form.name" type="text" id="name" required
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                                                        placeholder="Escriba la descripcion del documento" />
                                                </div>
                                                <!-- Footer del modal -->
                                                <div
                                                    class="flex justify-end space-x-2 pt-2 border-t dark:border-gray-600">
                                                    <button type="button" @click="closeModal"
                                                        class="text-sm px-3 py-1.5 bg-gray-200 rounded hover:bg-gray-300">
                                                        Cancelar
                                                    </button>
                                                    <button type="submit"
                                                        class="text-sm px-3 py-1.5 bg-blue-700 text-white rounded hover:bg-blue-800">
                                                        Guardar
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>