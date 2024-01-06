<script setup>

    import { ref, onMounted } from 'vue';

    import api from '../../api';

    const dosens = ref([]);

    const fetchDataDosens = async () => {

        await api.get('/api/dosens')

        .then(response => {

            dosens.value = response.data.data.data

        });
    }

        onMounted(() => {

            fetchDataDosens();
        });

            const deleteDosens = async (id) => {

    await api.delete(`/api/dosens/${id}`)
    .then(() => {

        fetchDataDosens();
    })

};

</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'dosens.create' }" class="btn btn-md btn-success rounded shadow border-0 mb-3">ADD NEW DOSEN PENGAJAR</router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nama Dosen Pengampu</th>
                                    <th scope="col">Mata Kuliah</th>
                                    <th scope="col" style="width:15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="dosens.length == 0">
                                    <td colspan="4" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            Data Belum Tersedia!
                                        </div>
                                    </td>
                                </tr>
                                <tr v-else v-for="(dosens, index) in dosens" :key="index">
                                    <td class="text-center">
                                        <img :src="dosens.image" width="200" class="rounded-3"/>
                                    </td>
                                    <td>{{ dosens.name }}</td>
                                    <td>{{ dosens.matkul }}</td>
                                    <td class="text-center">
                                        <router-link :to="{ name: 'dosens.edit', params:{id: dosens.id} }" class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">EDIT</router-link>
                                        <button @click.prevent="deleteDosens(dosens.id)" class="btn btn-sm btn-warning rounded-sm shadow border-0">DELETE</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>