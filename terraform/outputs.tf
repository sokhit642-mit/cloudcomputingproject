output "manager_public_ip" {
  description = "Public IP of Swarm Manager"
  value       = aws_instance.manager.public_ip
}

output "worker_public_ips" {
  description = "Public IPs of Swarm Workers"
  value       = aws_instance.workers[*].public_ip
}

output "manager_ssh_command" {
  description = "Command to SSH into manager node"
  value       = "ssh -i ${var.key_name}.pem ubuntu@${aws_instance.manager.public_ip}"
}
