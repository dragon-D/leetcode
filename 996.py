import collections

class Solution:
    def numSquarefulPerms(self, A: 'List[int]') -> 'int':
        n = len(A)
        res = 0
        def permute(nums, i):

            nonlocal res
            if i == n:
                res += 1
                print(nums)
                return
            for k in range(i, n):
                if i != k and nums[i] == nums[k]:
                    continue
                nums[i], nums[k] = nums[k], nums[i]
                if i == 0 or int((nums[i] + nums[i-1]) ** (0.5)) ** 2 == (nums[i] + nums[i-1]):
                    print(i)

                    permute(nums.copy(), i+1)

        A.sort()
        permute(A, 0)
        return res


a = Solution()
print(a.numSquarefulPerms([2,2,4,4,1,3,2,3,1,5,2]))
#print(a.numSquarefulPerms([65,44,5,11]))
#print(a.numSquarefulPerms([1,17,8]))