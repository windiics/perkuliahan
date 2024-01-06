<script setup>

    import { ref, onMounted } from 'vue';

    import api from '../../api';

    const mahasiswas = ref([]);

    const fetchDataMahasiswas = async () => {

        await api.get('/api/mahasiswas')

        .then(response => {

            posts.value = response.data.data.data

        });
    }

        onMounted(() => {

            fetchDataMahasiswas();
        });

            const deleteMahasiswas = async (id) => {

    await api.delete(`/api/mahasiswas/${id}`)
    .then(() => {

        fetchDataMahasiswas();
    })

};

</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'mahasiswas.create' }" class="btn btn-md btn-success rounded shadow border-0 mb-3">ADD NEW MAHASISWA</router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white text-center">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col" style="width:15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="mahasiswas.length == 0">
                                    <td colspan="4" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            Data Belum Tersedia!
                                        </div>
                                    </td>
                                </tr>
                                <tr v-else v-for="(mahasiswas, index) in mahasiswas" :key="index">
                                    <td class="text-center">
                                        <img :src="mahasiswas.image" width="200" class="rounded-3"/>
                                    </td>
                                    <td>{{ mahasiswas.name }}</td>
                                    <td>{{ mahasiswas.alamat }}</td>
                                    <td class="text-center">
                                        <router-link :to="{ name: 'mahasiswas.edit', params:{id: mahasiswas.id} }" class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">EDIT</router-link>
                                        <button @click.prevent="deleteMahasiswas(mahasiswas.id)" class="btn btn-sm btn-warning rounded-sm shadow border-0">DELETE</button>
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