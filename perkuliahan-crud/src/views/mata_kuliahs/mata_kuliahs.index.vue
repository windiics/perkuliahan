<script setup>

    import { ref, onMounted } from 'vue';

    import api from '../../api';

    const mata_kuliahs = ref([]);

    const fetchDatamata_kuliahs = async () => {

        await api.get('/api/mata_kuliahs')

        .then(response => {

            mata_kuliahs.value = response.data.data.data

        });
    }

        onMounted(() => {

            fetchDatamata_kuliahs();
        });

            const deletemata_kuliahs = async (id) => {

    await api.delete(`/api/mata_kuliahs/${id}`)
    .then(() => {

        fetchDatamata_kuliahs();
    })

};

</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'mata_kuliahs.create' }" class="btn btn-md btn-success rounded shadow border-0 mb-3">ADD NEW MATA KULIAH</router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th scope="col">Nama Mata Kuliah</th>
                                    <th scope="col" style="width:15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="mata_kuliahs.length == 0">
                                    <td colspan="4" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            Data Belum Tersedia!
                                        </div>
                                    </td>
                                </tr>
                                <tr v-else v-for="(mata_kuliahs, index) in mata_kuliahs" :key="index">
                                    <td class="text-center">
                                        <img :src="mata_kuliahs.image" width="200" class="rounded-3"/>
                                    </td>
                                    <td>{{ mata_kuliahs.name }}</td>
                                    <td class="text-center">
                                        <router-link :to="{ name: 'mata_kuliahs.edit', params:{id: mata_kuliahs.id} }" class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">EDIT</router-link>
                                        <button @click.prevent="deletemata_kuliahs(mata_kuliahs.id)" class="btn btn-sm btn-warning rounded-sm shadow border-0">DELETE</button>
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