variable "aws_region" {
  type        = string
  default     = "ap-southeast-2"
  description = "Target AWS Region"
}

variable "instance_type" {
  type        = string
  default     = "t3.micro"
  description = "EC2 instance type"
}

variable "key_name" {
  type        = string
  default     = "H2"
  description = "Name of existing EC2 Key Pair"
}
