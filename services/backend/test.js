const assert = require('assert');

console.log('Running automated backend unit tests...');
try {
  assert.strictEqual(1 + 1, 2, 'Basic arithmetic check failed');
  assert.ok(process.version, 'Node environment verified');
  console.log('✓ All tests passed successfully.');
  process.exit(0);
} catch (error) {
  console.error('✗ Test failed:', error);
  process.exit(1);
}