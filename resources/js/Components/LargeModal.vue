<template>
    <v-dialog>
        <template v-slot:activator="{ props: activatorProps }">
            <v-btn
                v-bind="activatorProps"
                icon="mdi-plus"
            />
        </template>

        <!-- Main modal -->
        <template v-slot:default="{ isActive }">
            <!-- Modal Body -->
            <slot name="body"/>
        </template>
    </v-dialog>
</template>
