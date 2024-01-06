<script setup>

    import { ref, onMounted } from 'vue';

    import api from '../../api';

    const prodis = ref([]);

    const fetchDataProdis = async () => {

        await api.get('/api/prodis')

        .then(response => {

            prodis.value = response.data.data.data

        });
    }

        onMounted(() => {

            fetchDataProdis();
        });

            const deleteProdis = async (id) => {


    await api.delete(`/api/prodis/${id}`)
    .then(() => {

        fetchDataProdis();
    })

};

</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'prodis.create' }" class="btn btn-md btn-success rounded shadow border-0 mb-3">ADD NEW PRODI</router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th scope="col">Nama Prodi</th>
                                    <th scope="col" style="width:15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="prodis.length == 0">
                                    <td colspan="4" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            Data Belum Tersedia!
                                        </div>
                                    </td>
                                </tr>
                                <tr v-else v-for="(prodis, index) in prodis" :key="index">
                                    <td class="text-center">
                                        <img :src="prodis.image" width="200" class="rounded-3"/>
                                    </td>
                                    <td>{{ prodis.name }}</td>
                                    <td class="text-center">
                                        <router-link :to="{ name: 'prodis.edit', params:{id: prodis.id} }" class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">EDIT</router-link>
                                        <button @click.prevent="deleteProdis(prodis.id)" class="btn btn-sm btn-warning rounded-sm shadow border-0">DELETE</button>
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