<script setup>

import {ref, onMounted} from 'vue';
import CreatePersonForm from "../Components/CreatePersonForm.vue";
import LargeModal from "../Components/LargeModal.vue";

const search = ''
const headers = [
    {
        align: 'start',
        key: 'name',
        sortable: false,
        title: 'Nome',
    },
    {key: 'social_name', title: 'Nome Social'},
    {key: 'email', title: 'Email'},
    {key: 'cpf', title: 'CPF'},
]
const items = ref([]);

onMounted(() => {
    axios.get(route('person.index')).then(response => {
        items.value = response.data.items;
    });
});
</script>


<template>
    <v-card
        title="Pessoas"
        flat
    >
        <v-container>
            <v-row>
                <v-col cols="6" class="mr-2 ml-0" align="start">
                    <v-text-field
                        v-model="search"
                        label="Search"
                        prepend-inner-icon="mdi-magnify"
                        hide-details
                        single-line
                    ></v-text-field>
                </v-col>
                <v-col cols="4" class="mr-0" align="end">
                    <LargeModal>
                        <template v-slot:body>
                            <CreatePersonForm />
                        </template>
                    </LargeModal>

                </v-col>
            </v-row>
        </v-container>

        <v-data-table
            :headers="headers"
            :items="items"
            :search="search"
        ></v-data-table>
    </v-card>
</template>
