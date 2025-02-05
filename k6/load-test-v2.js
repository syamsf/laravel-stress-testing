import http from 'k6/http';
import { check, sleep } from 'k6';

export default function () {
    const userId = Math.floor(Math.random() * 1000000) + 1;

    const res = http.get(`http://localhost:2704/about-me/${userId}`);

      check(res, {
        'status is 200': (r) => r.status === 200,
        'response time is less than 500ms': (r) => r.timings.duration < 500,
      });

    sleep(1);
}
