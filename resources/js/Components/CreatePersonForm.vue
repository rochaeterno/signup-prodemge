<script setup>
import {reactive} from 'vue'
import useVuelidate from "@vuelidate/core";
import {required, email} from "@vuelidate/validators"

const initialState = {
    name: '',
    father_name: '',
    mother_name: '',
    social_name: '',
    phone: '',
    email: '',
    cpf: '',
};

const state = reactive({
    ...initialState,
})

const rules = {
    name: {required},
    social_name: {required},
    mother_name: {required},
    father_name: {required},
    email: {required, email},
    phone: {required},
    cpf: {required},
}

const v$ = useVuelidate(rules, state)

function clear() {
    v$.value.$reset();

    for (const [key, value] of Object.entries(initialState)) {
        state[key] = value;
    }
}

const submit = async () => {
    const isValid = await v$.value.$validate();

    if (isValid) {
        try {
            const response = await axios.post(route('person.create'), state);
            console.log('Form submitted successfully:', response.data);
            // Reset the form after successful submission
            clear();
        } catch (error) {
            console.error('Error submitting form:', error);
        }
    } else {
        console.log('Validation failed');
    }
};

</script>

<template>
    <v-card>
        <form>
            <v-text-field
                v-model="state.name"
                :counter="40"
                :error-messages="v$.name.$errors.map(e => e.$message)"
                label="Nome"
                required
                @blur="v$.name.$touch"
                @input="v$.name.$touch"
            ></v-text-field>

            <v-text-field
                v-model="state.social_name"
                :counter="40"
                :error-messages="v$.social_name.$errors.map(e => e.$message)"
                label="Nome Social"
                required
                @blur="v$.name.$touch"
                @input="v$.name.$touch"
            ></v-text-field>

            <v-text-field
                v-model="state.mother_name"
                :counter="40"
                :error-messages="v$.mother_name.$errors.map(e => e.$message)"
                label="Nome da Mãe"
                required
                @blur="v$.name.$touch"
                @input="v$.name.$touch"
            ></v-text-field>

            <v-text-field
                v-model="state.father_name"
                :counter="40"
                :error-messages="v$.father_name.$errors.map(e => e.$message)"
                label="Nome do Pai"
                required
                @blur="v$.name.$touch"
                @input="v$.name.$touch"
            ></v-text-field>

            <v-text-field
                v-model="state.email"
                :error-messages="v$.email.$errors.map(e => e.$message)"
                label="Email"
                required
                @blur="v$.email.$touch"
                @input="v$.email.$touch"
            ></v-text-field>

            <v-text-field
                v-model="state.phone"
                :counter="13"
                :error-messages="v$.phone.$errors.map(e => e.$message)"
                label="Telefone"
                required
                @blur="v$.name.$touch"
                @input="v$.name.$touch"
            ></v-text-field>

            <v-text-field
                v-model="state.cpf"
                :counter="11"
                :error-messages="v$.cpf.$errors.map(e => e.$message)"
                label="CPF"
                required
                @blur="v$.name.$touch"
                @input="v$.name.$touch"
            ></v-text-field>

            <v-btn
                class="me-4"
                @click="submit"
            >
                submit
            </v-btn>
            <v-btn @click="clear">
                clear
            </v-btn>
        </form>
    </v-card>

</template>
