<script setup>
    import { ref } from "vue";

    import { useRouter } from 'vue-router';

    import api from "../../api";

    const router = useRouter();

    const name = ref("");
    const errors = ref([]);


    const storemata_kuliahs = async () => {

        let formData = new FormData();

        formData.append("name", name.value);

        await api.mata_kuliahs('/api/mata_kuliahs', formData)
        .then(() => {
            router.push({ path: "/mata_kuliahs" });
        })
        .catch((error) => {
            errors.value = error.response.data;
        });
    };
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <form @submit.prevent="storemata_kuliahs()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" class="form-control" v-model="name" placeholder="Nama MataKuliah">
                                <div v-if="errors.name" class="alert alert-danger mt-2">
                                    <span>{{ errors.name[0] }}</span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>