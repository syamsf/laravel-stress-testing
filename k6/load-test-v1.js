import http from 'k6/http';
import { check, sleep } from 'k6';

// Configuration
export const options = {
  stages: [
    { duration: '1m', target: 100 },   // Ramp up to 50 users over 1 minute
    // { duration: '1m', target: 50 },   // Stay at 50 users for 3 minutes
    { duration: '1m', target: 0 },    // Ramp down to 0 users over 1 minute
  ],
  thresholds: {
    http_req_duration: ['p(95)<500'], // 95% of requests should complete within 500ms
    http_req_failed: ['rate<0.01'],   // Less than 1% of requests should fail
  },
};

// Test Function
export default function () {
  const userId = Math.floor(Math.random() * 1000000) + 1;

  const res = http.get(`http://localhost:2704/about-me/${userId}`);
  
  check(res, {
    'status is 200': (r) => r.status === 200,
    'response time is less than 500ms': (r) => r.timings.duration < 500,
  });

  // sleep(1); // Wait 1 second between requests
}
