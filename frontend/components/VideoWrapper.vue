<template>
    <div class="video">
        <h1 class="video-title">The best solution for you: Impact Training Program</h1>

        <div class="video-container">
            <div class="video-wrapper">
                <video ref="videoRef" class="video-player">
                    <source src="/public/videos/Impact-Drill.mp4" type="video/mp4">
                </video>
            </div>

            <div class="progress-bar">
                <div ref="progressRef" class="progress-indicator"></div>
            </div>

            <div class="progress-bar-vertical">
                <div ref="progressVerticalRef" class="progress-indicator-vertical"></div>
            </div>

            <div class="collapsable-cards-container">
                <div class="card" ref="staticDrillRef">
                    <div class="card-title">
                        <svg class="rotated-element" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99999 6.68599C5.86665 6.68599 5.74165 6.66515 5.62499 6.62349C5.50832 6.58182 5.39999 6.51099 5.29999 6.41099L0.699988 1.81099C0.516654 1.62765 0.424988 1.39432 0.424988 1.11099C0.424988 0.827653 0.516654 0.59432 0.699988 0.410986C0.883321 0.227653 1.11665 0.135986 1.39999 0.135986C1.68332 0.135986 1.91665 0.227653 2.09999 0.410986L5.99999 4.31099L9.89999 0.410986C10.0833 0.227653 10.3167 0.135986 10.6 0.135986C10.8833 0.135986 11.1167 0.227653 11.3 0.410986C11.4833 0.59432 11.575 0.827653 11.575 1.11099C11.575 1.39432 11.4833 1.62765 11.3 1.81099L6.69999 6.41099C6.59999 6.51099 6.49165 6.58182 6.37499 6.62349C6.25832 6.66515 6.13332 6.68599 5.99999 6.68599Z" fill="#5773FF"/>
                        </svg>

                        <p>Static top drill</p>
                    </div>
                    <div class="card-description hide">
                        Get a feel for the optimal wrist position at Top of your swing
                    </div>
                </div>
                <div class="card" ref="dynamicDrillRef">
                    <div class="card-title">
                        <svg class="rotated-element" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99999 6.68599C5.86665 6.68599 5.74165 6.66515 5.62499 6.62349C5.50832 6.58182 5.39999 6.51099 5.29999 6.41099L0.699988 1.81099C0.516654 1.62765 0.424988 1.39432 0.424988 1.11099C0.424988 0.827653 0.516654 0.59432 0.699988 0.410986C0.883321 0.227653 1.11665 0.135986 1.39999 0.135986C1.68332 0.135986 1.91665 0.227653 2.09999 0.410986L5.99999 4.31099L9.89999 0.410986C10.0833 0.227653 10.3167 0.135986 10.6 0.135986C10.8833 0.135986 11.1167 0.227653 11.3 0.410986C11.4833 0.59432 11.575 0.827653 11.575 1.11099C11.575 1.39432 11.4833 1.62765 11.3 1.81099L6.69999 6.41099C6.59999 6.51099 6.49165 6.58182 6.37499 6.62349C6.25832 6.66515 6.13332 6.68599 5.99999 6.68599Z" fill="#5773FF"/>
                        </svg>

                        <p>Dynamic top drill</p>
                    </div>
                    <div class="card-description hide">
                        Dynamically train your wrist position at Top
                    </div>
                </div>
                <div class="card" ref="swingChallengeRef">
                    <div class="card-title">
                        <svg class="rotated-element" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99999 6.68599C5.86665 6.68599 5.74165 6.66515 5.62499 6.62349C5.50832 6.58182 5.39999 6.51099 5.29999 6.41099L0.699988 1.81099C0.516654 1.62765 0.424988 1.39432 0.424988 1.11099C0.424988 0.827653 0.516654 0.59432 0.699988 0.410986C0.883321 0.227653 1.11665 0.135986 1.39999 0.135986C1.68332 0.135986 1.91665 0.227653 2.09999 0.410986L5.99999 4.31099L9.89999 0.410986C10.0833 0.227653 10.3167 0.135986 10.6 0.135986C10.8833 0.135986 11.1167 0.227653 11.3 0.410986C11.4833 0.59432 11.575 0.827653 11.575 1.11099C11.575 1.39432 11.4833 1.62765 11.3 1.81099L6.69999 6.41099C6.59999 6.51099 6.49165 6.58182 6.37499 6.62349C6.25832 6.66515 6.13332 6.68599 5.99999 6.68599Z" fill="#5773FF"/>
                        </svg>

                        <p>Top full swing challenge</p>
                    </div>
                    <div class="card-description hide">
                        Train your maximum power swing
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { ref, onMounted, watch } from 'vue';

const videoRef = ref(null);
const progressRef = ref(0);
const progressVerticalRef = ref(0);
const staticDrillRef = ref(0);
const dynamicDrillRef = ref(0);
const swingChallengeRef = ref(0);

const userId = useUserId();
const { pageUrl, dateTime } = usePageInfo();

async function videoWatched() {
    await fetch(`${useRuntimeConfig().public.apiBase}/video-watched`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            userId: userId,
            pageUrl: pageUrl,
            dateTime: dateTime,
            browser: navigator.userAgent,
            eventName: 'video-watched'
        }),
    });
}

onMounted(() => {
    if (videoRef.value) {
        videoRef.value.addEventListener('click', () => {
            if (videoRef.value.paused) {
                videoRef.value.play();
            } else {
                videoRef.value.pause();
            }
        });

        videoRef.value.addEventListener('timeupdate', updateProgress);
    }
});

const updateProgress = () => {
    const { currentTime, duration } = videoRef.value;
    const progressValue = duration ? Math.floor((currentTime / duration) * 100) : 0;

    progressRef.value.style.width = `${progressValue}%`;
    progressVerticalRef.value.style.height = `${progressValue}%`;

    if (progressValue === 100) {
        videoWatched();
    }

    const drills = [
        { ref: staticDrillRef, start: 5, end: 14 },
        { ref: dynamicDrillRef, start: 14, end: 24 },
        { ref: swingChallengeRef, start: 24, end: 32 }
    ];

    drills.forEach(({ ref, start, end }) => {
        const card = ref.value;
        const description = card.querySelector('.card-description');
        const svg = card.querySelector('svg');

        if (currentTime >= start && currentTime < end) {
            description.classList.remove('hide');
            svg.classList.add('rotate-up');
        } else {
            description.classList.add('hide');
            svg.classList.remove('rotate-up');
        }
    });
};

</script>

<style scoped lang="scss">

@use '@/assets/css/variables' as *;

.video-title {
    color: $primary;
    font-weight: 500;
    font-size: 2rem;
    border-bottom: 1px solid $border-grey;
    padding-bottom: 1rem;
    margin-bottom: 1rem;
}

.video-wrapper {
    margin-bottom: 2rem;

    .video-player {
        width: 100%;
        cursor: pointer;
    }
}

.progress-bar {
    background-color: white;
    height: 1rem;
    padding: 5px;
    border-radius: 1rem;
    margin-bottom: 2rem;

    .progress-indicator {
        background-color: $primary;
        height: 100%;
        border-radius: 1rem;
        width: 0%;
    }
}

.progress-bar-vertical {
    display: none;
}

.collapsable-cards-container {
    .card {
        border-bottom: 1px solid $border-grey;
        padding-bottom: 12px;
        margin-bottom: 2rem;

        .card-title {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        svg {
            margin: 0 10px 0 6px;
        }

        p {
            color: $primary;
            font-size: 20px;
            font-weight: 500;
        }

        .card-description {
            font-weight: 400;
            font-size: 1rem;
        }
    }
}

.hide {
    display: none;
}

.rotated-element {
    transition: transform 0.1s ease-in-out;
}

.rotate-up {
    transform: rotate(180deg);
}

@media (min-width: 1024px) {
    .video-container {
        display: flex;
        gap: 3rem;
        margin-bottom: 4rem;

        .video-title {
            font-size: 3rem;
            padding-bottom: 2rem;
        }

        .video-wrapper {
            max-width: 746px;
            margin-bottom: 0;
        }

        .progress-bar {
            display: none;
        }

        .progress-bar-vertical {
            background-color: white;
            display: block;
            width: 1rem;
            padding: 5px;
            border-radius: 1rem;

            .progress-indicator-vertical {
                background-color: $primary;
                border-radius: 1rem;
                width: 100%;
            }
        }

        .collapsable-cards-container {
            flex-grow: 1;

            p {
                font-size: 24px;
            }
        }
    }
}

</style>