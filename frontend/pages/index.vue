<template>
    <div>
        <div class="hero">
            <div class="package">
                <p class="quiz-result">We have put together a swing improvement solution to help you <span class="quiz-break">{{quizBreak}}</span></p>

                <div class="pack-container">
                    <p class="pack-title">Pack includes:</p>
                    <div class="pack-info">
                        <p>Swing Analyzer - HackMotion Core</p>
                        <p class="pack-info-central">Drills by coach Tyler Ferrell</p>
                        <p>Game improvement plan by HackMotion</p>
                    </div>
                </div>

                <button class="btn">
                    <div class="btn-content">
                        <div>Start Now</div>
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.13125 6.75H0.75C0.5375 6.75 0.359375 6.67812 0.215625 6.53437C0.071875 6.39062 0 6.2125 0 6C0 5.7875 0.071875 5.60937 0.215625 5.46562C0.359375 5.32187 0.5375 5.25 0.75 5.25H9.13125L5.45625 1.575C5.30625 1.425 5.23438 1.25 5.24063 1.05C5.24688 0.849998 5.325 0.674998 5.475 0.524998C5.625 0.387498 5.8 0.315623 6 0.309373C6.2 0.303123 6.375 0.374998 6.525 0.524998L11.475 5.475C11.55 5.55 11.6031 5.63125 11.6344 5.71875C11.6656 5.80625 11.6812 5.9 11.6812 6C11.6812 6.1 11.6656 6.19375 11.6344 6.28125C11.6031 6.36875 11.55 6.45 11.475 6.525L6.525 11.475C6.3875 11.6125 6.21562 11.6812 6.00937 11.6812C5.80312 11.6812 5.625 11.6125 5.475 11.475C5.325 11.325 5.25 11.1469 5.25 10.9406C5.25 10.7344 5.325 10.5562 5.475 10.4062L9.13125 6.75Z" fill="white"/>
                        </svg>
                    </div>
                </button>
            </div>


            <div class="img-container">
                <img src="/public/images/Improvement_Graph.png" alt="Improvement Graph">
                <img class="single-image image-central" src="/public/images/Improvement_Progress_bar.png" alt="Improvement Progress bar">
                <img class="single-image" src="/public/images/Frame_4151178.png" alt="Clubface Control">
                <img class="horizontal-images" src="/public/images/Frame_4151179.png" alt="Clubface Control">
            </div>
        </div>

        <VideoWrapper />
    </div>
</template>

<script setup>

import { ref } from 'vue';
import { useRoute } from 'vue-router';

const queryParams = reactive({
    breakPar: 'Break Par',
    break80: 'Break 80',
    break90: 'Break 90',
    break100: 'Break 100',
});

const route = useRoute();
const currentParam = route.query.break;

const quizBreak = computed(() => queryParams[route.query.break] || 'Default Break');

</script>

<style scoped lang="scss">

@use '@/assets/css/variables' as *;

.quiz-result {
    font-weight: 500;
    font-size: 24px;
    line-height: 31.2px;
    margin-bottom: 2rem;
}

.quiz-break {
    color: $primary;
}

.pack-container {
    margin-bottom: 2rem;

    .pack-title {
        font-weight: 400;
        font-size: 20px;
        border-bottom: 1px solid $border-grey;
        padding-bottom: 12px;;
        margin-bottom: 12px;
    }

    .pack-info {
        border-left: 4px solid $primary;

        p {
            font-size: 20px;
            font-weight: 500;
            padding-left: 12px;
        }

        .pack-info-central {
            margin: 1rem 0;
        }
    }
}

.btn {
    color: white;
    background-color: $primary;
    border: none;
    padding: 10px 1rem;
    border-radius: 20px;
    font-weight: 500;
    font-size: 14px;
    margin-bottom: 2rem;
    cursor: pointer;

    .btn-content {
        display: flex;
        align-items: center;

        svg {
            margin-left: 8px;
        }
    }
}

.img-container {
    display: flex;
    flex-direction: column;
    margin-bottom: 3rem;

    img {
        max-width: 100%;
    }

    .horizontal-images {
        display: none;
    }

    .image-central {
        padding: 1rem 0;
    }
}

@media (min-width: 1024px) {
    .hero {
        display: flex;
        align-items: center;
        gap: 2rem;
        margin-bottom: 222px;

        .package {
            width: 45%;
        }

        .quiz-result {
            font-size: 2rem;
        }

        .pack-container {
            .pack-title {
                font-size: 24px;
            }

            .pack-info {
                p {
                    font-size: 24px;
                }
            }
        }

        .btn {
            padding: 10px 1rem;
            font-size: 1rem;
            margin-bottom: 2rem;

            .btn-content {
                display: flex;
                align-items: center;

                svg {
                    margin-left: 8px;
                }
            }
        }

        .img-container {
            width: 45%;
            margin-bottom: 0;

            .single-image {
                display: none;
            }

            .horizontal-images {
                display: block;
                margin-top: 1rem;
            }
        }
    }
}

</style>